<?php

namespace Database\Seeders;

use App\Enums\DocumentType;
use App\Enums\Role as RoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $superAdmin = Role::where('name', RoleEnum::SUPER_ADMIN)->first();
    $mod = Role::where('name', RoleEnum::MODERATOR)->first();
    $emp = Role::where('name', RoleEnum::EMPLOYEE)->first();

    User::create([
      'name' => 'Administrador',
      'email' => 'admin@example.com',
      'password' => 'password',
      'email_verified_at' => now(),
      'document_type' => DocumentType::VENEZOLANO,
      'document_number' => 12940582,
    ])->assignRole($superAdmin);

    User::create([
      'name' => 'Moderador',
      'email' => 'moderador@example.com',
      'password' => 'password',
      'email_verified_at' => now(),
      'document_type' => DocumentType::VENEZOLANO,
      'document_number' => 20185920,
    ])->assignRole($mod);

    User::create([
      'name' => 'Moderador2',
      'email' => 'moderador2@example.com',
      'password' => 'password',
      'email_verified_at' => now(),
      'document_type' => DocumentType::VENEZOLANO,
      'document_number' => 20185922,
    ])->assignRole($mod);

    User::create([
      'name' => 'Empleado',
      'email' => 'empleado@example.com',
      'password' => 'password',
      'email_verified_at' => now(),
      'document_type' => DocumentType::VENEZOLANO,
      'document_number' => 14959023,
    ])->assignRole($emp);

    User::create([
      'name' => 'Empleado2',
      'email' => 'empleado2@example.com',
      'password' => 'password',
      'email_verified_at' => now(),
      'document_type' => DocumentType::VENEZOLANO,
      'document_number' => 14959022,
    ])->assignRole($emp);
  }
}

