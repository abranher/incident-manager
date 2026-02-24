<?php

namespace App\Observers;

use App\Enums\Role as RoleEnum;
use App\Models\Incident;
use App\Models\User;
use App\Notifications\NewIncidentCreated;
use Illuminate\Support\Facades\Notification;

class IncidentObserver
{
  /**
   * Handle the Incident "created" event.
   */
  public function created(Incident $incident): void
  {
    $superAdmins = User::role(RoleEnum::SUPER_ADMIN->value)->get();

    $departmentModerators = $incident->department->moderators;

    $usersToNotify = $superAdmins->merge($departmentModerators)->unique('id');

    Notification::send($usersToNotify, new NewIncidentCreated($incident));
  }

  /**
   * Handle the Incident "updated" event.
   */
  public function updated(Incident $incident): void
  {
      //
  }

  /**
   * Handle the Incident "deleted" event.
   */
  public function deleted(Incident $incident): void
  {
      //
  }

  /**
   * Handle the Incident "restored" event.
   */
  public function restored(Incident $incident): void
  {
      //
  }

  /**
   * Handle the Incident "force deleted" event.
   */
  public function forceDeleted(Incident $incident): void
  {
      //
  }
}

