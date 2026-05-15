<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    private const LIVE_VISITOR_WINDOW_MINUTES = 5;
    private const RUNNING_DATE = '2026-05-06';

    public function __invoke(Request $request): View
    {
        $today = today();
        $yesterday = today()->subDay();

        $this->recordVisit($request, $today->toDateString());
        
        return view('pages.home', [
            'liveVisitors' => $this->liveVisitors($request),
            'todayVisitors' => $this->visitorCountForDate($today->toDateString()),
            'yesterdayVisitors' => $this->visitorCountForDate($yesterday->toDateString()),
            'totalVisitors' => DB::table('visitor_logs')->count(),
            'totalSubmissions' => DB::table('creator_link_submissions')->count(),
            'featuredCreatorCount' => $this->featuredCreatorCount($today),
            'runningDate' => Carbon::parse(self::RUNNING_DATE)->format('d-m-Y'),
            'featuredCreators' => DB::table('creator_link_winners')
                ->whereDate('winner_date', $today)
                ->get()
                ->keyBy('platform'),
        ]);
    }

    private function recordVisit(Request $request, string $visitedOn): void
    {
        DB::table('visitor_logs')->updateOrInsert(
            [
                'session_id' => $request->session()->getId(),
                'visited_on' => $visitedOn,
            ],
            [
                'ip_address' => $request->ip(),
                'user_agent_hash' => hash('sha256', $request->userAgent() ?? ''),
                'updated_at' => now(),
                'created_at' => now(),
            ],
        );
    }

    private function liveVisitors(Request $request): int
    {
        $activeSince = now()->subMinutes(self::LIVE_VISITOR_WINDOW_MINUTES)->timestamp;

        $liveVisitors = DB::table('sessions')
            ->where('last_activity', '>=', $activeSince)
            ->count();

        $currentSessionTracked = DB::table('sessions')
            ->where('id', $request->session()->getId())
            ->where('last_activity', '>=', $activeSince)
            ->exists();

        return $currentSessionTracked ? $liveVisitors : $liveVisitors + 1;
    }

    private function visitorCountForDate(string $date): int
    {
        return DB::table('visitor_logs')
            ->whereDate('visited_on', $date)
            ->count();
    }

    private function featuredCreatorCount(Carbon $today): int
    {
        $runningDate = Carbon::parse(self::RUNNING_DATE)->startOfDay();

        if ($today->lt($runningDate)) {
            return 0;
        }

        return ($runningDate->diffInDays($today) + 1) * 3;
    }
}
