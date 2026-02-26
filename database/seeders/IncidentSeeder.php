<?php

namespace Database\Seeders;

use App\Enums\IncidentStatus;
use App\Enums\IncidentPriority;
use App\Models\Incident;
use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $users = User::all();
    $departments = Department::all();

    $casos = [
      'Fallo de conexión en red local',
      'Soporte para cambio de monitor',
      'Error crítico al iniciar sesión',
      'Configuración de nuevo correo',
      'Reparación de aire acondicionado'
    ];

    foreach ($casos as $titulo) {
      Incident::create([
        'title' => $titulo,
        'description' => "Esta es una descripción detallada para el reporte de $titulo.",
        'status' => IncidentStatus::NEW,
        'priority' => IncidentPriority::cases()[array_rand(IncidentPriority::cases())],
        'user_id' => $users->random()->id,
        'department_id' => $departments->random()->id,
      ]);
    }
  }
}

