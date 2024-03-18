<?php

namespace App\Filament\Resources\Services\SuperiorityResource\Pages;

use App\Filament\Resources\Services\SuperiorityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuperiority extends EditRecord
{
    protected static string $resource = SuperiorityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
