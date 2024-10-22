<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Banner;
use App\Models\Ad;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalUsers = User::count();
        $totalBanners = Banner::count();
        $totalAds = Ad::count();

        $usersToday = User::whereDate('created_at', Carbon::today())->count();
        $usersYesterday = User::whereDate('created_at', Carbon::yesterday())->count();
        $userGrowth = $this->calculatePercentageGrowth($usersYesterday, $usersToday);

        $recentUsers = User::latest()->take(5)->get();  

        $avgImpressions = Banner::withCount('impressions')->get()->avg('impressions_count');

        return [
            Stat::make('Total Users', $totalUsers)
                ->description("Users Today: {$usersToday} (+{$userGrowth}%)")
                ->color($userGrowth >= 0 ? 'success' : 'danger'),

            Stat::make('Total Banners', $totalBanners)
                ->description("Avg Impressions: " . number_format($avgImpressions, 2))
                ->color('primary'),

            Stat::make('Total Ads', $totalAds)
                ->description('Manage your ad campaigns effectively')
                ->color('warning'),
        ];
    }

    public function renderRecentUsers()
    {
        $recentUsers = User::latest()->take(5)->get();
        return view('filament.widgets.recent-users', ['recentUsers' => $recentUsers]);
    }

    private function calculatePercentageGrowth($previous, $current): int
    {
        if ($previous === 0) {
            return $current > 0 ? 100 : 0;
        }
        return round((($current - $previous) / $previous) * 100);
    }
    
}
