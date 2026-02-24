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

class NewIncidentCreated extends Notification
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
      ->title('Nueva incidencia reportada')
      ->body(Str::markdown("**{$this->incident->reporter->name}** ha reportado: {$this->incident->title} en el departamento de **{$this->incident->department->name}**."))
      ->icon(Heroicon::OutlinedExclamationTriangle)
      ->color('danger')
      ->actions([
        Action::make('view')
          ->label('Ver Incidencia')
          ->url(fn () => IncidentResource::getUrl('view', ['record' => $this->incident->id])),
      ])
      ->getDatabaseMessage();
  }
}

