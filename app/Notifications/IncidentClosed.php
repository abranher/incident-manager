<?php

namespace App\Notifications;

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

class IncidentClosed extends Notification
{
  use Queueable;

  /**
   * Create a new notification instance.
   */
  public function __construct(protected Incident $incident, protected bool $isForTeam = false)
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
    $incidentTitle = $this->incident->title;
    $incidentStatus = $this->incident->status->getLabel();

    $title = $this->isForTeam ? 'Incidencia Finalizada' : 'Tu incidencia ha sido resuelta';
    $body = $this->isForTeam
      ? "**{$incidentTitle}** ha sido cerrada por un miembro del equipo."
      : "Buenas noticias, **{$incidentTitle}** ha sido marcada como **{$incidentStatus}**.";

    return FilamentNotification::make()
      ->title($title)
      ->body(Str::markdown($body))
      ->icon(Heroicon::OutlinedCheckBadge)
      ->color('success')
      ->actions([
        Action::make('view')
          ->label('Ver detalle')
          ->url(fn () => IncidentResource::getUrl('view', ['record' => $this->incident->id])),
      ])
      ->getDatabaseMessage();
  }
}

