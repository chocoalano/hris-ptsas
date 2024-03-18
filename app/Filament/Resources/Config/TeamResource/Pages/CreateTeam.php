<?php

namespace App\Filament\Resources\Config\TeamResource\Pages;

use App\Filament\Resources\Config\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    protected static string $resource = TeamResource::class;
    protected function getCreatedNotification(): ?\Filament\Notifications\Notification
    {
        $recipient = auth()->user();
        $title='team';
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
