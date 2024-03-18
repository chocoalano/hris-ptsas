<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Resources\Blog\PostResource;
use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['createdby'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);
        return $data;
    }
}
