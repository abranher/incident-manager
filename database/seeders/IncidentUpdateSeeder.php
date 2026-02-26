<?php

namespace Database\Seeders;

use App\Enums\IncidentStatus;
use App\Models\Incident;
use App\Models\IncidentUpdate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentUpdateSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $incidents = Incident::all();

    foreach ($incidents as $incident) {
      IncidentUpdate::create([
        'incident_id' => $incident->id,
        'user_id' => $incident->user_id,
        'comment' => 'Se ha recibido la incidencia y se está analizando.',
        'previous_status' => IncidentStatus::NEW,
        'new_status' => IncidentStatus::ASSIGNED,
      ]);

      $incident->update(['status' => IncidentStatus::ASSIGNED]);
    }
  }
}

