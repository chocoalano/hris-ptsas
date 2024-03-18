<?php

namespace App\Filament\Resources\Services\ProductResource\Pages;

use App\Filament\Resources\Services\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
