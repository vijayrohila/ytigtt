<?php

namespace App\Console\Commands;

use App\Models\CreatorLinkSubmission;
use App\Models\CreatorLinkWinner;
use Carbon\Carbon;
use Illuminate\Console\Command;

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

        $existingWinnersCount = CreatorLinkWinner::query()
            ->where('winner_date', $processDate)
            ->count();

        if ($existingWinnersCount > 0 && ! $this->option('force')) {
            $this->line("Winners already exist for {$processDate}; skipping command.");
            return self::SUCCESS;
        }

        CreatorLinkWinner::query()
            ->where('winner_date', $processDate)
            ->delete();

        $this->line("Deleted existing winners for {$processDate} before saving new winners.");

        foreach ($platforms as $platform) {
            $submission = CreatorLinkSubmission::query()
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

            CreatorLinkWinner::query()->create([
                'winner_date' => $processDate,
                'platform' => $platform,
                'submission_id' => $submissionId,
                'winner_link' => $winnerLink,
                'clicks' => 0,
            ]);

            $picked++;
            if ($submissionId) {
                $this->info("{$platform}: selected submission #{$submissionId} for {$processDate}.");
            } else {
                $this->info("{$platform}: selected fallback link for {$processDate}.");
            }
        }

        CreatorLinkSubmission::query()->delete();

        $this->info("Picked {$picked} winner(s) for {$processDate}.");
        $this->info('Deleted all rows from creator_link_submissions.');

        return self::SUCCESS;
    }
}
