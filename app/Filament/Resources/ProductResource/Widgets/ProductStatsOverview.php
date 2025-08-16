<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class ProductStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        $baseQuery = Product::query();
        if (!$user->hasRole(['super_admin', 'admin'])) {
            $baseQuery->where('store_id', $user->store->id);
        }
        
        $productsCount = $baseQuery->count();
        $productsDiscountedCount = (clone $baseQuery)->where('original_price', '!=', null)->count();
        $productsFeaturedCount = (clone $baseQuery)->where('is_featured', true)->count();

        return [
            Stat::make('Jumlah Produk', $productsCount),
            Stat::make('Produk Diskon', $productsDiscountedCount),
            Stat::make('Produk Unggulan', $productsFeaturedCount),
        ];
    }
}
