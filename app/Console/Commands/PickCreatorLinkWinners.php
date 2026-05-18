<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PickCreatorLinkWinners extends Command
{
    protected $signature = 'creator-links:pick-winners
        {--date= : UTC date to process, defaults to yesterday}
        {--force : Replace existing winners for the processed date}';

    protected $description = 'Pick one YouTube, Instagram, and TikTok submission as daily winners.';

    private const FALLBACK_LINKS = [
        'yt' => 'https://www.youtube.com/shorts/FjW6ZZGeqZ8',
        'ig' => 'https://www.instagram.com/p/Bh8psJYH1lq',
        'tt' => 'https://tiktok.com',
    ];
    private const TIMEZONE = 'UTC';

    public function handle(): int
    {
        $processDate = $this->option('date')
            ? Carbon::parse($this->option('date'), self::TIMEZONE)->toDateString()
            : Carbon::yesterday(self::TIMEZONE)->toDateString();

        $platforms = ['yt', 'ig', 'tt'];
        $picked = 0;

        $existingWinnersCount = DB::table('creator_link_winners')
            ->where('winner_date', $processDate)
            ->count();

        if ($existingWinnersCount > 0 && ! $this->option('force')) {
            $this->line("Winners already exist for {$processDate}; skipping command.");
            return self::SUCCESS;
        }

        DB::table('creator_link_winners')->delete();

        $this->line("Deleted existing winners for {$processDate} before saving new winners.");

        foreach ($platforms as $platform) {
            $submission = DB::table('creator_link_submissions')
                ->where('submission_date', $processDate)
                ->where('platform', $platform)
                ->inRandomOrder()
                ->first();

            if (! $submission) {
                $winnerLink = self::FALLBACK_LINKS[$platform];
                $submissionId = null;
                $this->warn("{$platform}: no submissions found for {$processDate}; using fallback link.");
            } else {
                $winnerLink = $submission->submitted_link;
                $submissionId = $submission->id;
            }

            DB::table('creator_link_winners')->insert([
                'winner_date' => $processDate,
                'platform' => $platform,
                'submission_id' => $submissionId,
                'winner_link' => $winnerLink,
                'clicks' => 0,
                'created_at' => now(self::TIMEZONE),
                'updated_at' => now(self::TIMEZONE),
            ]);

            $picked++;
            if ($submissionId) {
                $this->info("{$platform}: selected submission #{$submissionId} for {$processDate}.");
            } else {
                $this->info("{$platform}: selected fallback link for {$processDate}.");
            }
        }

        DB::table('creator_link_submissions')->delete();

        $this->info("Picked {$picked} winner(s) for {$processDate}.");
        $this->info('Deleted all rows from creator_link_submissions.');

        return self::SUCCESS;
    }
}
