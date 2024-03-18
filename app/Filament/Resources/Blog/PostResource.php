<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Filament\Resources\Blog\PostResource\RelationManagers;
use App\Models\Blog\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Blogs';
    protected static ?string $navigationLabel = 'Posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\FileUpload::make('cover')->columnSpan('full'),
                    Forms\Components\TextInput::make('keywords')->required(),
                    Forms\Components\TextInput::make('title')->required()->columnSpan(2),
                    Forms\Components\Textarea::make('description')->required()->columnSpan('full'),
                    Forms\Components\Select::make('category_id')->relationship(name: 'category', titleAttribute: 'name')->label('Set Category')->options(\App\Models\Blog\PostCategory::all()->pluck('name', 'id'))->searchable()->required(),
                    Forms\Components\Select::make('tags')->relationship(name: 'tags', titleAttribute: 'name')->label('Set Tags')->options(\App\Models\Blog\PostTag::all()->pluck('name', 'id'))->searchable()->multiple()->required(),
                    Forms\Components\Toggle::make('publish')->inline(false)->required(),
                    Forms\Components\RichEditor::make('content')->required()->columnSpan('full')
                ])->columns(3)
                ->description('This article post form will be displayed on the article page, make sure you make it as good as possible!'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No.')->rowIndex(),
                Tables\Columns\ImageColumn::make('cover')->circular(),
                Tables\Columns\TextColumn::make('title')->searchable()->limit(50),
                Tables\Columns\TextColumn::make('category.name')->searchable()->limit(50),
                Tables\Columns\TextColumn::make('publish')->searchable()->badge()->color(fn (string $state): string => match ($state) {
                    'publish' => 'primary',
                    'unpublish' => 'danger',
                }),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
