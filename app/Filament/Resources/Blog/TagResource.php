<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\TagResource\Pages;
use App\Filament\Resources\Blog\TagResource\RelationManagers;
use App\Models\Blog\PostTag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagResource extends Resource
{
    protected static ?string $model = PostTag::class;

    protected static ?string $navigationGroup = 'Blogs';
    protected static ?string $navigationLabel = 'Tags';
    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Form Tags')
                ->description('All tags from this form will be saved and will be displayed as a tag option to be selected on the blog post form.')
                ->schema([
                    Forms\Components\Repeater::make('tags')
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No.')->rowIndex(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->searchable()->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->searchable()->dateTime(),
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
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
