<?php

namespace App\Filament\Widgets;

use App\Models\Blog\Post;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Blog Post';
    protected int | string | array $columnSpan = 'full';
    protected static ?string $pollingInterval = '10s';
    protected function getData(): array
    {
        $data = Trend::model(Post::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}