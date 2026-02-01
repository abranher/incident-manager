<?php

namespace App\Filament\Resources\Roles\Schemas;

use App\Enums\Role as RoleEnum;
use App\Models\Role;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class RoleForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        TextInput::make('name')
          ->label('Nombre')
          ->placeholder('Ej. Supervisor')
          ->maxLength(100)
          ->unique()
          ->disabled(fn (?Role $record) => $record && $record->name === RoleEnum::SUPER_ADMIN->value)
          ->required(),
      ]);
  }
}

