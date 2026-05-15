<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PickCreatorLinkWinners extends Command
{
    protected $signature = 'creator-links:pick-winners
        {--date= : Winner date, defaults to today}
        {--from-date= : Submission date to pick from, defaults to the day before winner date}
        {--force : Replace existing winners for the winner date}';

    protected $description = 'Pick one YouTube, Instagram, and TikTok submission as daily winners.';

    private const FALLBACK_LINKS = [
        'yt' => 'https://www.youtube.com/shorts/FjW6ZZGeqZ8',
        'ig' => 'https://www.instagram.com/p/Bh8psJYH1lq',
        'tt' => 'https://tiktok.com',
    ];
    private const TIMEZONE = 'UTC';

    public function handle(): int
    {
        $winnerDate = $this->option('date')
            ? Carbon::parse($this->option('date'), self::TIMEZONE)->toDateString()
            : Carbon::today(self::TIMEZONE)->toDateString();

        $submissionDate = $this->option('from-date')
            ? Carbon::parse($this->option('from-date'), self::TIMEZONE)->toDateString()
            : Carbon::parse($winnerDate, self::TIMEZONE)->subDay()->toDateString();

        $platforms = ['yt', 'ig', 'tt'];
        $picked = 0;

        foreach ($platforms as $platform) {
            $existingWinner = DB::table('creator_link_winners')
                ->where('winner_date', $winnerDate)
                ->where('platform', $platform)
                ->exists();

            if ($existingWinner && ! $this->option('force')) {
                $this->line("{$platform}: winner already exists for {$winnerDate}; skipping.");
                continue;
            }

            $submission = DB::table('creator_link_submissions')
                ->where('submission_date', $submissionDate)
                ->where('platform', $platform)
                ->inRandomOrder()
                ->first();

            if (! $submission) {
                $winnerLink = self::FALLBACK_LINKS[$platform];
                $submissionId = null;
                $this->warn("{$platform}: no submissions found for {$submissionDate}; using fallback link.");
            } else {
                $winnerLink = $submission->submitted_link;
                $submissionId = $submission->id;
            }

            DB::table('creator_link_winners')->updateOrInsert(
                [
                    'winner_date' => $winnerDate,
                    'platform' => $platform,
                ],
                [
                    'submission_id' => $submissionId,
                    'winner_link' => $winnerLink,
                    'clicks' => 0,
                    'created_at' => now(self::TIMEZONE),
                    'updated_at' => now(self::TIMEZONE),
                ],
            );

            $picked++;
            if ($submissionId) {
                $this->info("{$platform}: selected submission #{$submissionId} for {$winnerDate}.");
            } else {
                $this->info("{$platform}: selected fallback link for {$winnerDate}.");
            }
        }

        $this->info("Picked {$picked} winner(s) from {$submissionDate} for {$winnerDate}.");

        return self::SUCCESS;
    }
}
