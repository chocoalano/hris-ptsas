<?php

namespace App\Filament\Resources\Config\UserResource\Pages;

use App\Filament\Resources\Config\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        $recipient = auth()->user();
        $title='user';
        $act='created';
        event(new \Filament\Notifications\Events\DatabaseNotificationsSent($recipient));
        return \Filament\Notifications\Notification::make()
        ->success()
        ->title(ucfirst($title).' '.$act.' successfully')
        ->body('The '.strtolower($title).' has been '.$act.' successfully.')
        ->sendToDatabase($recipient)
        ->broadcast($recipient);
    }
    protected function handleRecordCreation(array $data): Model
    {
        $u = static::getModel()::create([
            'name'=>$data['name'],
            'role_id'=>$data['role_id'],
            'email'=>$data['email'],
            'mobile_phone'=>$data['mobile_phone'],
            'phone'=>$data['phone'],
            'placebirth'=>$data['placebirth'],
            'birthdate'=>$data['birthdate'],
            'gender'=>$data['gender'],
            'religion'=>$data['religion'],
            'password'=>$data['password'],
            'identity_address'=>$data['identity_address'],
            'identity_numbers'=>$data['identity_numbers'],
            'identity_expired'=>$data['identity_expired'],
            'postal_code'=>$data['postal_code'],
            'citizen_idaddress'=>$data['citizen_idaddress'],
            'recidential_address'=>$data['recidential_address'],
        ]);
        $u->emp()->create($data['emp']);
        $u->family()->createMany($data['family']);
        $u->emergency_contact()->create($data['ec']);
        $u->education()->createMany($data['education']);
        return $u;
    }
}
