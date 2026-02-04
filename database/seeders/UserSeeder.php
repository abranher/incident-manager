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

    User::create([
      'name' => 'Administrador',
      'email' => 'admin@example.com',
      'password' => 'password',
      'email_verified_at' => now(),
      'document_type' => DocumentType::VENEZOLANO,
      'document_number' => 11111111,
    ])->assignRole($superAdmin);
  }
}

