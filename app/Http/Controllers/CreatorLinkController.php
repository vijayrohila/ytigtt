<?php

namespace App\Http\Controllers;

use App\Models\CreatorLinkSubmission;
use App\Models\CreatorLinkUnlock;
use App\Models\CreatorLinkWinner;
use App\Support\SettingStore;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreatorLinkController extends Controller
{
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
        $minViewSeconds = $this->minViewSeconds();
        $unlockTtlSeconds = $this->unlockTtlSeconds();

        CreatorLinkUnlock::query()->updateOrCreate(
            [
                'unlock_date' => Carbon::today()->toDateString(),
                'session_id' => $request->session()->getId(),
                'platform' => $platform,
            ],
            [
                'access_token' => $token,
                'ip_address' => $request->ip(),
                'clicked_at' => $now,
                'available_at' => $now->copy()->addSeconds($minViewSeconds),
                'expires_at' => $now->copy()->addSeconds($unlockTtlSeconds),
                'used_at' => null,
                'updated_at' => $now,
                'created_at' => $now,
            ],
        );

        $clicks = null;
        if ($request->filled('winner_id')) {
            $winner = CreatorLinkWinner::query()
                ->whereKey((int) $request->input('winner_id'))
                ->where('platform', $platform)
                ->first();

            if ($winner) {
                $winner->increment('clicks');
                $winner->refresh();

                $clicks = (int) $winner->clicks;
            }
        }

        return response()->json([
            'success' => true,
            'platform' => $platform,
            'token' => $token,
            'available_at' => $now->copy()->addSeconds($minViewSeconds)->timestamp,
            'expires_at' => $now->copy()->addSeconds($unlockTtlSeconds)->timestamp,
            'min_view_seconds' => $minViewSeconds,
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

        $unlock = CreatorLinkUnlock::query()
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
        if ($now->lt($unlock->available_at)) {
            return response()->json([
                'success' => false,
                'error' => 'Please wait at least '.$this->minViewSeconds().' seconds before submitting.',
            ], 422);
        }

        if ($now->gt($unlock->expires_at)) {
            $unlock->update(['used_at' => $now]);

            return response()->json([
                'success' => false,
                'expired' => true,
                'error' => 'This submit unlock expired. Click the featured creator again.',
            ], 422);
        }

        DB::transaction(function () use ($request, $platform, $link, $validated, $unlock, $now): void {
            CreatorLinkSubmission::query()->create([
                'submission_date' => Carbon::today()->toDateString(),
                'platform' => $platform,
                'submitted_link' => $link,
                'access_token' => $validated['access_token'],
                'session_id' => $request->session()->getId(),
                'ip_address' => $request->ip(),
                'submitted_at' => $now,
            ]);

            $unlock->update(['used_at' => $now]);

            SettingStore::increment('total_submissions');
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

    private function minViewSeconds(): int
    {
        return max(1, (int) config('creator_links.min_view_seconds', 10));
    }

    private function unlockTtlSeconds(): int
    {
        return max($this->minViewSeconds(), (int) config('creator_links.unlock_ttl_seconds', 180));
    }
}
