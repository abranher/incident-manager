<?php

namespace App\Notifications\Employee;

use App\Filament\Resources\Incidents\IncidentResource;
use App\Models\IncidentUpdate;
use Filament\Actions\Action;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Support\Icons\Heroicon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class IncidentUpdated extends Notification
{
  use Queueable;

  /**
   * Create a new notification instance.
   */
  public function __construct(protected IncidentUpdate $update)
  {
    //
  }

  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    return ['database'];
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toArray(object $notifiable): array
  {
    return FilamentNotification::make()
      ->title("Estado actualizado: {$this->update->incident->title}")
      ->body(Str::markdown("Tu incidencia ha pasado de **{$this->update->previous_status->getLabel()}** a **{$this->update->new_status->getLabel()}**."))
      ->icon($this->update->new_status->getColor() === 'success'
        ? Heroicon::OutlinedCheckCircle
        : Heroicon::OutlinedArrowPath
      )
      ->color($this->update->new_status->getColor())
      ->actions([
        Action::make('view')
          ->label('Ver Incidencia')
          ->url(fn () => IncidentResource::getUrl('view', ['record' => $this->update->incident_id])),
      ])
      ->getDatabaseMessage();
  }
}

