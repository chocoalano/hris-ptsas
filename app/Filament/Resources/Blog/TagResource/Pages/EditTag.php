<?php

namespace App\Filament\Resources\Blog\TagResource\Pages;

use App\Filament\Resources\Blog\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditTag extends EditRecord
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $record=[
            "tags"=>[]
        ];
        array_push($record['tags'], $data);
        return $record;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        foreach ($data['tags'] as $key) {
            $record->update($key);
        }
        return $record;
    }
}
