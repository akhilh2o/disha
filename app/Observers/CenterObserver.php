<?php

namespace App\Observers;

use App\Models\Center;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class CenterObserver
{
    /**
     * Handle the Center "created" event.
     */
    public function created(Center $center): void
    {
        Notification::make()
            ->title('New center created successfully')
            ->success()
            ->body('New center have been created.')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.admin.resources.centers.edit', $center), shouldOpenInNewTab: true),
                Action::make('undo')
                    ->color('gray'),
            ])
            ->sendToDatabase(auth()->user());
    }

    /**
     * Handle the Center "updated" event.
     */
    public function updated(Center $center): void
    {
        Notification::make()
            ->title('Center updated successfully')
            ->success()
            ->body('Changes to the center have been saved.')
            ->actions([
                Action::make('view')
                    ->button()
                    ->url(route('filament.admin.resources.centers.edit', $center), shouldOpenInNewTab: true),
                Action::make('undo')
                    ->color('gray'),
            ])
            ->sendToDatabase(auth()->user());
    }

    /**
     * Handle the Center "deleted" event.
     */
    public function deleted(Center $center): void
    {
        //
    }

    /**
     * Handle the Center "restored" event.
     */
    public function restored(Center $center): void
    {
        //
    }

    /**
     * Handle the Center "force deleted" event.
     */
    public function forceDeleted(Center $center): void
    {
        //
    }
}
