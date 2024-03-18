<?php

namespace App\Filament\Resources\Config\UserResource\Pages;

use App\Filament\Resources\Config\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getSavedNotification(): ?\Filament\Notifications\Notification
    {
        $recipient = auth()->user();
        $title='user';
        $act='saved';
        event(new \Filament\Notifications\Events\DatabaseNotificationsSent($recipient));
        return \Filament\Notifications\Notification::make()
        ->success()
        ->title(ucfirst($title).' '.$act.' successfully')
        ->body('The '.strtolower($title).' has been '.$act.' successfully.')
        ->sendToDatabase($recipient)
        ->broadcast($recipient);
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
         if ($data['password'] == null) {
            unset($data["password"]);
         }
         return $data;
    }
}
