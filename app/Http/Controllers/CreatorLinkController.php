<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreatorLinkController extends Controller
{
    private const MIN_VIEW_SECONDS = 10;
    private const UNLOCK_TTL_SECONDS = 600;
    private const PLATFORM_LABELS = [
        'yt' => 'YouTube',
        'ig' => 'Instagram',
        'tt' => 'TikTok',
    ];
    private const ALLOWED_HOSTS = [
        'yt' => ['youtube.com', 'm.youtube.com', 'youtu.be'],
        'ig' => ['instagram.com', 'm.instagram.com'],
        'tt' => ['tiktok.com', 'm.tiktok.com', 'vm.tiktok.com', 'vt.tiktok.com'],
    ];

    public function click(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'platform' => ['required', Rule::in(['yt', 'ig', 'tt'])],
            'winner_id' => ['nullable', 'integer', 'min:1'],
        ]);

        $platform = $validated['platform'];
        $now = Carbon::now();
        $token = bin2hex(random_bytes(20));

        DB::table('creator_link_unlocks')->updateOrInsert(
            [
                'unlock_date' => Carbon::today()->toDateString(),
                'session_id' => $request->session()->getId(),
                'platform' => $platform,
            ],
            [
                'access_token' => $token,
                'ip_address' => $request->ip(),
                'clicked_at' => $now,
                'available_at' => $now->copy()->addSeconds(self::MIN_VIEW_SECONDS),
                'expires_at' => $now->copy()->addSeconds(self::UNLOCK_TTL_SECONDS),
                'used_at' => null,
                'updated_at' => $now,
                'created_at' => $now,
            ],
        );

        $clicks = null;
        if ($request->filled('winner_id')) {
            $winner = DB::table('creator_link_winners')
                ->where('id', (int) $request->input('winner_id'))
                ->where('platform', $platform)
                ->first();

            if ($winner) {
                DB::table('creator_link_winners')
                    ->where('id', $winner->id)
                    ->increment('clicks');

                $clicks = (int) $winner->clicks + 1;
            }
        }

        return response()->json([
            'success' => true,
            'platform' => $platform,
            'token' => $token,
            'available_at' => $now->copy()->addSeconds(self::MIN_VIEW_SECONDS)->timestamp,
            'min_view_seconds' => self::MIN_VIEW_SECONDS,
            'clicks' => $clicks,
        ]);
    }

    public function submit(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'platform' => ['required', Rule::in(['yt', 'ig', 'tt'])],
            'link' => ['required', 'string', 'max:2048'],
            'access_token' => ['required', 'string', 'size:40'],
        ]);

        $platform = $validated['platform'];
        $link = $this->normalizeUrl($validated['link']);

        if (! $this->isAllowedPlatformUrl($platform, $link)) {
            return response()->json([
                'success' => false,
                'error' => 'Please submit a valid '.$this->platformLabel($platform).' link only.',
            ], 422);
        }

        $unlock = DB::table('creator_link_unlocks')
            ->where('unlock_date', Carbon::today()->toDateString())
            ->where('session_id', $request->session()->getId())
            ->where('platform', $platform)
            ->where('access_token', $validated['access_token'])
            ->whereNull('used_at')
            ->first();

        if (! $unlock) {
            return response()->json([
                'success' => false,
                'error' => 'Click the featured creator first to unlock this submit box.',
            ], 422);
        }

        $now = Carbon::now();
        if ($now->lt(Carbon::parse($unlock->available_at))) {
            return response()->json([
                'success' => false,
                'error' => 'Please wait at least '.self::MIN_VIEW_SECONDS.' seconds before submitting.',
            ], 422);
        }

        if ($now->gt(Carbon::parse($unlock->expires_at))) {
            return response()->json([
                'success' => false,
                'error' => 'This submit unlock expired. Click the featured creator again.',
            ], 422);
        }

        DB::transaction(function () use ($request, $platform, $link, $validated, $unlock, $now): void {
            DB::table('creator_link_submissions')->insert([
                'submission_date' => Carbon::today()->toDateString(),
                'platform' => $platform,
                'submitted_link' => $link,
                'access_token' => $validated['access_token'],
                'session_id' => $request->session()->getId(),
                'ip_address' => $request->ip(),
                'submitted_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('creator_link_unlocks')
                ->where('id', $unlock->id)
                ->update([
                    'used_at' => $now,
                    'updated_at' => $now,
                ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Your '.$this->platformLabel($platform).' link submitted successfully.',
        ]);
    }

    private function normalizeUrl(string $link): string
    {
        $link = trim($link);

        if (! preg_match('/^https?:\/\//i', $link)) {
            $link = 'https://'.$link;
        }

        return $link;
    }

    private function isAllowedPlatformUrl(string $platform, string $link): bool
    {
        $host = parse_url($link, PHP_URL_HOST);
        $path = parse_url($link, PHP_URL_PATH);

        if (! is_string($host) || ! is_string($path) || $path === '' || $path === '/') {
            return false;
        }

        $host = strtolower($host);
        $host = str_starts_with($host, 'www.') ? substr($host, 4) : $host;

        return in_array($host, self::ALLOWED_HOSTS[$platform] ?? [], true);
    }

    private function platformLabel(string $platform): string
    {
        return self::PLATFORM_LABELS[$platform] ?? 'creator';
    }
}
