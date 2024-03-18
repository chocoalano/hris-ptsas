<?php

namespace App\Filament\Resources\Blog\TagResource\Pages;

use App\Filament\Resources\Blog\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data['tags'];
    }
    protected function handleRecordCreation(array $data): Model
    {
        $models = [];
        foreach ($data as $key) {
            $model = static::getModel()::create($key);
            $models[] = $model;
        }
        return $models[0];
    }
}
