<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Role as RoleEnum;
use App\Filament\Fields\DocumentField;
use App\Models\Role;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Password;

class UserForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        TextInput::make('name')
          ->label('Nombre')
          ->placeholder('Ej: Juan Pérez')
          ->required(),
        TextInput::make('email')
          ->label('Correo electrónico')
          ->placeholder('Ej: ejemplo@dominio.com')
          ->unique()
          ->email()
          ->required(),
        DocumentField::make()
          ->columns(2),
        Select::make('roles')
          ->label('Rol')
          ->relationship('roles', 'name')
          ->preload()
          ->searchable()
          ->getOptionLabelFromRecordUsing(fn (Model $record) =>
            RoleEnum::tryFrom($record->name)?->getLabel() ?? $record->name
          )
          ->hiddenOn(Operation::Edit),
        TextInput::make('password')
          ->label('Contraseña')
          ->placeholder('Mínimo 8 caracteres')
          ->password()
          ->rule(
            Password::min(8)
              ->max(20)
              ->symbols()
              ->numbers()
              ->mixedCase()
          )
          ->confirmed()
          ->required()
          ->revealable()
          ->hiddenOn(Operation::Edit),
        TextInput::make('password_confirmation')
          ->label('Confirmar contraseña')
          ->placeholder('Repita la contraseña anterior')
          ->password()
          ->required()
          ->revealable()
          ->hiddenOn(Operation::Edit),
      ]);
  }
}

