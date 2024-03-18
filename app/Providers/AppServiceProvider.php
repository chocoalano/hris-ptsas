<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Config Application')
                    ->icon('heroicon-s-wrench-screwdriver')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Master Data')
                    ->icon('heroicon-s-table-cells')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Blogs')
                    ->icon('heroicon-s-arrow-up-on-square-stack')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Services')
                    ->icon('heroicon-s-check-badge')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Site Settings')
                    ->icon('fas-gear')
                    ->collapsed(),
            ]);
        });
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');
    }
}
