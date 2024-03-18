<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Profile extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static string $view = 'filament.pages.profile';
    protected static bool $shouldRegisterNavigation = false;
    public ?array $data = [];
 
    public function mount(): void
    {
        $u = User::where('id', auth()->user()->id)->first();
        $this->form->fill($u->toArray());
    }

    public function updateProfile(): void
    {
        $data = $this->form->getState();
        $u=User::find(auth()->user()->id);
        $u->name=$data['name'];
        $u->email=$data['email'];
        $u->email_verified_at=$data['email_verified_at'];
        $u->mobile_phone=$data['mobile_phone'];
        $u->phone=$data['phone'];
        $u->placebirth=$data['placebirth'];
        $u->birthdate=$data['birthdate'];
        $u->gender=$data['gender'];
        $u->bloodtype=$data['bloodtype'];
        $u->religion=$data['religion'];
        if(!is_null($data['password'])){
            $u->password=bcrypt($data['password']);
        }
        $u->identity_address=$data['identity_address'];
        $u->identity_numbers=$data['identity_numbers'];
        $u->identity_expired=$data['identity_expired'];
        $u->postal_code=$data['postal_code'];
        $u->citizen_idaddress=$data['citizen_idaddress'];
        $u->recidential_address=$data['recidential_address'];
        $u->save();
        Notification::make()
            ->title('Saved successfully')
            ->duration(10000)
            ->success()
            ->send();
    }
    protected function getUpdateProfileFormActions(): array
    {
        return [
            Action::make('updateProfileAction')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('editProfileForm'),
        ];
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                ->schema([
                    Section::make('Persons')->columns([ 'sm' => 1, 'xl' => 3, '2xl' => 3,])->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required(),
                        DatePicker::make('email_verified_at')->required(),
                        TextInput::make('mobile_phone')->numeric()->required(),
                        TextInput::make('phone')->numeric()->required(),
                        TextInput::make('placebirth')->required(),
                        DatePicker::make('birthdate')->required(),
                        Radio::make('gender')->label('Chosed gender?')->options([
                            'male' => 'Male',
                            'female' => 'Female'
                        ])->inline()->required(),
                        Radio::make('bloodtype')->label('Chosed blood type?')->options([
                            'A'=>'A', 'B'=>'B', 'AB'=>'AB', 'O'=>'O'
                        ])->inline()->required(),
                        Select::make('religion')->options([
                            'Catholic'=>'Catholic',
                            'Islam'=>'Islam',
                            'Christian'=>'Christian',
                            'Buddha'=>'Buddha',
                            'Hindu'=>'Hindu',
                            'Confucius'=>'Confucius',
                            'Others'=>'Others'
                        ])->required(),
                        TextInput::make('password')->password(),
                        Select::make('identity_address')->options([
                            'KTP'=>'KTP',
                            'Passport'=>'Passport',
                        ])->required(),
                        TextInput::make('identity_numbers')->numeric()->required(),
                        DatePicker::make('identity_expired')->required(),
                        TextInput::make('postal_code')->numeric()->required(),
                        Textarea::make('citizen_idaddress')->columnSpan('full')->required(),
                        Textarea::make('recidential_address')->columnSpan('full')->required()
                    ]),
                ])
            ])
            ->statePath('data');
    }
}
