<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\SuperiorityResource\Pages;
use Illuminate\Support\Str;
use App\Models\Services\Superiority;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SuperiorityResource extends Resource
{
    protected static ?string $model = Superiority::class;

    protected static ?string $navigationLabel = 'Superiority';
    protected static ?string $navigationGroup = 'Services';

    public static function getGloballySearchableAttributes(): array
    {
        return [ 'title', 'description' ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Form Superiority')
                ->description('The stored data will be displayed on the service pages')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('svg')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->columnSpanFull(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->description(fn (Superiority $record): string => Str::limit($record->description, 100))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuperiorities::route('/'),
            'create' => Pages\CreateSuperiority::route('/create'),
            'edit' => Pages\EditSuperiority::route('/{record}/edit'),
        ];
    }
}
