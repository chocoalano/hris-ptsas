<?php

namespace App\Filament\Resources\Config\PermissionResource\Pages;

use App\Filament\Resources\Config\PermissionResource;
use Filament\Actions;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getSavedNotification(): ?Notification
    {
        $recipient = auth()->user();
        event(new DatabaseNotificationsSent($recipient));
        return Notification::make()
        ->success()
        ->title('Permission saved successfully')
        ->body('The permission has been saved successfully.')
        ->sendToDatabase($recipient)
        ->broadcast($recipient);
    }
}
