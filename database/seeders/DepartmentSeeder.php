<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $depts = [
      'Tecnología IT',
      'Recursos Humanos',
      'Mantenimiento',
      'Operaciones',
      'Atención Cliente',
    ];

    foreach ($depts as $name) {
      Department::create(['name' => $name]);
    }
  }
}

