<?php

namespace App\Filament\Customer\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\MenuViewLog;
use App\Models\Product;

class PopularProductsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $popular = MenuViewLog::whereNotNull('product_id')
            ->selectRaw('product_id, COUNT(*) as views')
            ->groupBy('product_id')
            ->orderByDesc('views')
            ->take(3)
            ->get();

        $stats = [];
        foreach ($popular as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $stats[] = Stat::make($product->name, $item->views . ' görüntüleme');
            }
        }
        if (empty($stats)) {
            $stats[] = Stat::make('Popüler Ürün Yok', 'Henüz veri yok');
        }
        return $stats;
    }
}
