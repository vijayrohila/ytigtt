<?php

namespace App\Http\Controllers;

use App\Models\CreatorLinkWinner;
use App\Models\Session;
use App\Models\VisitorLog;
use App\Support\SettingStore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    private const LIVE_VISITOR_WINDOW_MINUTES = 5;
    private const TIMEZONE = 'UTC';

    public function __invoke(Request $request): View
    {
        $today = Carbon::today(self::TIMEZONE);
        $yesterday = $today->copy()->subDay();

        $this->recordVisit($request, $today->toDateString());
        
        $latestWinnerDate = CreatorLinkWinner::query()
            ->whereDate('winner_date', '<=', $today)
            ->max('winner_date');

        return view('pages.home', [
            'liveVisitors' => $this->liveVisitors($request),
            'todayVisitors' => $this->visitorCountForDate($today->toDateString()),
            'yesterdayVisitors' => $this->visitorCountForDate($yesterday->toDateString()),
            'totalVisitors' => VisitorLog::query()->count(),
            'totalSubmissions' => SettingStore::integer('total_submissions'),
            'featuredCreatorCount' => $this->featuredCreatorCount($today, $this->servingSinceDate()),
            'runningDate' => $today->format('d-m-Y'),
            'servingSince' => $this->servingSinceDate()->format('d-m-Y'),
            'minViewSeconds' => max(1, (int) config('creator_links.min_view_seconds', 10)),
            'featuredCreators' => $latestWinnerDate
                ? CreatorLinkWinner::query()
                    ->whereDate('winner_date', $latestWinnerDate)
                    ->get()
                    ->keyBy('platform')
                : collect(),
        ]);
    }

    private function recordVisit(Request $request, string $visitedOn): void
    {
        VisitorLog::query()->updateOrCreate(
            [
                'session_id' => $request->session()->getId(),
                'visited_on' => $visitedOn,
            ],
            [
                'ip_address' => $request->ip(),
                'user_agent_hash' => hash('sha256', $request->userAgent() ?? ''),
            ],
        );
    }

    private function liveVisitors(Request $request): int
    {
        $activeSince = now(self::TIMEZONE)->subMinutes(self::LIVE_VISITOR_WINDOW_MINUTES)->timestamp;

        $liveVisitors = Session::query()
            ->where('last_activity', '>=', $activeSince)
            ->count();

        $currentSessionTracked = Session::query()
            ->where('id', $request->session()->getId())
            ->where('last_activity', '>=', $activeSince)
            ->exists();

        return $currentSessionTracked ? $liveVisitors : $liveVisitors + 1;
    }

    private function visitorCountForDate(string $date): int
    {
        return VisitorLog::query()
            ->whereDate('visited_on', $date)
            ->count();
    }

    private function featuredCreatorCount(Carbon $today, Carbon $servingSince): int
    {
        if ($today->lt($servingSince)) {
            return 0;
        }

        return ($servingSince->diffInDays($today) + 1) * 3;
    }

    private function servingSinceDate(): Carbon
    {
        return Carbon::parse(config('creator_links.serving_since', '2026-05-04'), self::TIMEZONE)
            ->startOfDay();
    }
}
