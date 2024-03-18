<?php

namespace App\Filament\Resources\Config;

use App\Filament\Resources\Config\UserResource\Pages;
use App\Filament\Resources\Config\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Users Manage';
    protected static ?string $navigationGroup = 'Master Data';

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'name',
            'email',
            'mobile_phone',
            'phone',
            'placebirth',
            'birthdate',
            'gender',
            'religion',
            'identity_address',
            'identity_numbers',
            'identity_expired',
            'postal_code',
            'citizen_idaddress',
            'recidential_address',
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make()->columns(['sm' => 3, 'xl' => 4, '2xl' => 4])->schema([
                    Infolists\Components\TextEntry::make('name')->color('primary'),
                    Infolists\Components\TextEntry::make('email')->color('primary'),
                    Infolists\Components\TextEntry::make('mobile_phone')->color('primary'),
                    Infolists\Components\TextEntry::make('phone')->color('primary'),
                    Infolists\Components\TextEntry::make('placebirth')->color('primary'),
                    Infolists\Components\TextEntry::make('birthdate')->color('primary'),
                    Infolists\Components\TextEntry::make('gender')->color('primary'),
                    Infolists\Components\TextEntry::make('religion')->color('primary'),
                    Infolists\Components\TextEntry::make('identity_address')->color('primary'),
                    Infolists\Components\TextEntry::make('identity_numbers')->color('primary'),
                    Infolists\Components\TextEntry::make('identity_expired')->color('primary'),
                    Infolists\Components\TextEntry::make('postal_code')->color('primary'),
                    Infolists\Components\TextEntry::make('citizen_idaddress')->color('primary')->columnSpan(2),
                    Infolists\Components\TextEntry::make('recidential_address')->color('primary')->columnSpan(2),
                ])
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                ->schema([
                    Forms\Components\Section::make('Persons')->columns([ 'sm' => 1, 'xl' => 4, '2xl' => 4,])->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\Select::make('role_id')->relationship(name: 'role', titleAttribute: 'name')->label('Role User')->options(\App\Models\Config\Role::all()->pluck('name', 'id'))->searchable()->required(),
                        Forms\Components\TextInput::make('email')->email()->required(),
                        Forms\Components\DatePicker::make('email_verified_at')->required(),
                        Forms\Components\TextInput::make('mobile_phone')->numeric()->required(),
                        Forms\Components\TextInput::make('phone')->numeric()->required(),
                        Forms\Components\TextInput::make('placebirth')->required(),
                        Forms\Components\DatePicker::make('birthdate')->required(),
                        Forms\Components\Radio::make('gender')->label('Chosed gender?')->options([
                            'male' => 'Male',
                            'female' => 'Female'
                        ])->inline()->required(),
                        Forms\Components\Radio::make('bloodtype')->label('Chosed blood type?')->options([
                            'A'=>'A', 'B'=>'B', 'AB'=>'AB', 'O'=>'O'
                        ])->inline()->required(),
                        Forms\Components\Select::make('religion')->options([
                            'Catholic'=>'Catholic',
                            'Islam'=>'Islam',
                            'Christian'=>'Christian',
                            'Buddha'=>'Buddha',
                            'Hindu'=>'Hindu',
                            'Confucius'=>'Confucius',
                            'Others'=>'Others'
                        ])->required(),
                        Forms\Components\TextInput::make('password')->password(),
                        Forms\Components\Select::make('identity_address')->options([
                            'KTP'=>'KTP',
                            'Passport'=>'Passport',
                        ])->required(),
                        Forms\Components\TextInput::make('identity_numbers')->numeric()->required(),
                        Forms\Components\DatePicker::make('identity_expired')->required(),
                        Forms\Components\TextInput::make('postal_code')->numeric()->required(),
                        Forms\Components\Textarea::make('citizen_idaddress')->columnSpan('full')->required(),
                        Forms\Components\Textarea::make('recidential_address')->columnSpan('full')->required()
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No.')->rowIndex(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('mobile_phone')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\TextColumn::make('placebirth')->searchable(),
                Tables\Columns\TextColumn::make('birthdate')->searchable(),
                Tables\Columns\TextColumn::make('gender')->badge()
                ->color(fn (string $state): string => match ($state) {
                    'male' => 'primary',
                    'female' => 'success',
                })->searchable(),
                Tables\Columns\TextColumn::make('religion')->searchable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                Tables\Filters\SelectFilter::make('role')
                    ->relationship('role', 'name')
                    ->options(\App\Models\Config\Role::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
