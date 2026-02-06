<?php

namespace Database\Seeders;

use App\Enums\Permission as PermissionEnum;
use App\Enums\Role as RoleEnum;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    foreach (PermissionEnum::cases() as $permission) {
      Permission::firstOrCreate(['name' => $permission->value]);
    }

    $superAdmin = Role::firstOrCreate(['name' => RoleEnum::SUPER_ADMIN->value]);
    $allPermissions = Permission::where('name', '!=', PermissionEnum::CREATE_INCIDENT->value)->get();
    $superAdmin->syncPermissions($allPermissions);

    $moderator = Role::firstOrCreate(['name' => RoleEnum::MODERATOR->value]);
    $moderator->syncPermissions([
      // Incidents
      PermissionEnum::VIEW_ANY_INCIDENT->value,
      PermissionEnum::VIEW_INCIDENT->value,
      PermissionEnum::UPDATE_INCIDENT->value,
    ]);

    $employee = Role::firstOrCreate(['name' => RoleEnum::EMPLOYEE->value]);
    $employee->syncPermissions([
      // Departments
      PermissionEnum::VIEW_ANY_DEPARTMENT->value,
      PermissionEnum::VIEW_DEPARTMENT->value,

      // Incidents
      PermissionEnum::VIEW_ANY_INCIDENT->value,
      PermissionEnum::VIEW_INCIDENT->value,
      PermissionEnum::CREATE_INCIDENT->value,
      PermissionEnum::UPDATE_INCIDENT->value,
    ]);
  }
}

