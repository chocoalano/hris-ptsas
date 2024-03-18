<?php

namespace App\Filament\Widgets;

use App\Models\Blog\Post;
use App\Models\Blog\PostCategory;
use App\Models\Blog\PostTag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogPostOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Post Blog', Post::count())
                ->description(Post::count().' increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Post Blog Category', PostCategory::count())
                ->description(PostCategory::count().' increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Stat::make('Post Blog Tags', PostTag::count())
                ->description(PostTag::count().' increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
