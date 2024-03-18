<?php

namespace App\Filament\Resources\Blog\CategoryResource\Pages;

use App\Filament\Resources\Blog\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $record=[
            "categories"=>[]
        ];
        array_push($record['categories'], $data);
        return $record;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        foreach ($data['categories'] as $key) {
            $record->update($key);
        }
        return $record;
    }
}
