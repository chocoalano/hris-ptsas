<?php

namespace App\Filament\Resources\Config\RoleResource\Pages;

use App\Filament\Resources\Config\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;
    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        $recipient = auth()->user();
        $title='role';
        $act='created';
        event(new \Filament\Notifications\Events\DatabaseNotificationsSent($recipient));
        return \Filament\Notifications\Notification::make()
        ->success()
        ->title(ucfirst($title).' '.$act.' successfully')
        ->body('The '.strtolower($title).' has been '.$act.' successfully.')
        ->sendToDatabase($recipient)
        ->broadcast($recipient);
    }
}
