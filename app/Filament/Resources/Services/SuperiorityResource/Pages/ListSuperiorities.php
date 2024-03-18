<?php

namespace App\Filament\Resources\Services\SuperiorityResource\Pages;

use App\Filament\Resources\Services\SuperiorityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuperiorities extends ListRecords
{
    protected static string $resource = SuperiorityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
