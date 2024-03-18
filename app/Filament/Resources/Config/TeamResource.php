<?php

namespace App\Filament\Resources\Config;

use App\Filament\Resources\Config\TeamResource\Pages;
use App\Filament\Resources\Config\TeamResource\RelationManagers;
use App\Models\Config\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationLabel = 'Teams Manage';
    protected static ?string $navigationGroup = 'Config Application';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Team Forms')->columns([ 'sm' => 1, 'xl' => 2, '2xl' => 2,])->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(20),
                Forms\Components\Select::make('roles')
                    ->label('Give to role')
                    ->multiple()
                    ->relationship(name: 'role', titleAttribute: 'name')
                    ->required()
                    ->options(\App\Models\Config\Role::all()->pluck('name', 'id'))
                    ->loadingMessage('Loading...'),
                Forms\Components\Textarea::make('description')->columnSpan('full'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No.')->rowIndex(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('description')->searchable()->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\RoleRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'view' => Pages\ViewTeam::route('/{record}'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
