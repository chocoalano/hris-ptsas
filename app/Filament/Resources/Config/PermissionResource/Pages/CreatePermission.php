<?php

namespace App\Filament\Resources\Config\PermissionResource\Pages;

use App\Filament\Resources\Config\PermissionResource;
use Filament\Actions;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        $recipient = auth()->user();
        event(new DatabaseNotificationsSent($recipient));
        return Notification::make()
        ->success()
        ->title('Permission created successfully')
        ->body('The permission has been created successfully.')
        ->sendToDatabase($recipient)
        ->broadcast($recipient);
    }
}
