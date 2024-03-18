<?php

namespace App\Filament\Resources\Config\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmpCompanyRelationManager extends RelationManager
{
    protected static string $relationship = 'empCompany';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('companyName.name'),
                Tables\Columns\TextColumn::make('organizationName.name'),
                Tables\Columns\TextColumn::make('job_positionName.name'),
                Tables\Columns\TextColumn::make('job_level'),
                Tables\Columns\TextColumn::make('employment_status'),
                Tables\Columns\TextColumn::make('branchName.name'),
                Tables\Columns\TextColumn::make('join_date'),
                Tables\Columns\TextColumn::make('sign_date'),
                Tables\Columns\TextColumn::make('gradeName.name'),
                Tables\Columns\TextColumn::make('className.name'),
                Tables\Columns\TextColumn::make('approval_lineName.name'),
                Tables\Columns\TextColumn::make('approval_managerName.name'),
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
