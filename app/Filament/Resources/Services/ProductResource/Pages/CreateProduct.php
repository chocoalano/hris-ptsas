<?php

namespace App\Filament\Resources\Services\ProductResource\Pages;

use App\Filament\Resources\Services\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['slug'] = Str::of($data['title'])->slug('-');
 
    return $data;
}
}
