<?php

namespace App\Filament\Resources\Config\RoleResource\Pages;

use App\Filament\Resources\Config\RoleResource;
use Filament\Actions;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

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
        $title='role';
        $act='saved';
        event(new \Filament\Notifications\Events\DatabaseNotificationsSent($recipient));
        return \Filament\Notifications\Notification::make()
        ->success()
        ->title(ucfirst($title).' '.$act.' successfully')
        ->body('The '.strtolower($title).' has been '.$act.' successfully.')
        ->sendToDatabase($recipient)
        ->broadcast($recipient);
    }
}
