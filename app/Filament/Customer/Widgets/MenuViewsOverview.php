<?php

namespace App\Filament\Customer\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\MenuViewLog;
use Illuminate\Support\Carbon;

class MenuViewsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $total = MenuViewLog::count();
        $last7days = MenuViewLog::where('viewed_at', '>=', now()->subDays(7))->count();
        $today = MenuViewLog::whereDate('viewed_at', today())->count();
        return [
            Stat::make('Toplam Menü Görüntüleme', $total),
            Stat::make('Son 7 Gün', $last7days),
            Stat::make('Bugün', $today),
        ];
    }
}
