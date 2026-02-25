<?php

namespace App\Notifications\Moderator;

use App\Filament\Resources\Incidents\IncidentResource;
use App\Models\Incident;
use Filament\Actions\Action;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Support\Icons\Heroicon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class IncidentAssigned extends Notification
{
  use Queueable;

  /**
   * Create a new notification instance.
   */
  public function __construct(protected Incident $incident)
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
      ->title('Se te ha asignado una incidencia')
      ->body(Str::markdown("Has sido asignado como moderador para: **{$this->incident->title}** (Prioridad: {$this->incident->priority->getLabel()})."))
      ->icon(Heroicon::OutlinedUserPlus)
      ->color('info')
      ->actions([
        Action::make('view')
          ->label('Atender Ahora')
          ->url(fn () => IncidentResource::getUrl('view', ['record' => $this->incident->id])),
      ])
      ->getDatabaseMessage();
  }
}

