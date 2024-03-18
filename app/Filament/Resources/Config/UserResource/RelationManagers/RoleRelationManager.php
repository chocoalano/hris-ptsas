<?php

namespace App\Filament\Resources\Config\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoleRelationManager extends RelationManager
{
    protected static string $relationship = 'role';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(20)->columnSpan(2),
                Forms\Components\Textarea::make('description')->columnSpan(2),
                Forms\Components\Select::make('roles')
                    ->label('Give to permission')
                    ->multiple()
                    ->relationship(name: 'permission', titleAttribute: 'name')
                    ->required()
                    ->options(\App\Models\Config\Permission::all()->pluck('name', 'id'))
                    ->loadingMessage('Loading...')->columnSpan(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')->limit(100),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
