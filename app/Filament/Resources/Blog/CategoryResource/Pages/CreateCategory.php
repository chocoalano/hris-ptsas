<?php

namespace App\Filament\Resources\Blog\CategoryResource\Pages;

use App\Filament\Resources\Blog\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
    protected function handleRecordCreation(array $data): Model
    {
        $models = [];
        foreach ($data['categories'] as $key) {
            $model = static::getModel()::create($key);
            $models[] = $model;
        }
        return $models[0];
    }
}
