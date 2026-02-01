<?php

namespace App\Filament\Resources\Roles\Pages;

use App\Enums\Role as RoleEnum;
use App\Filament\Resources\Roles\RoleResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Auth\Access\AuthorizationException;

class EditRole extends EditRecord
{
  protected static string $resource = RoleResource::class;

  public function mount(int|string $record): void
  {
    parent::mount($record);

    if ($this->record->name === RoleEnum::SUPER_ADMIN->value) {
      throw new AuthorizationException('El rol Super Administrador es inmutable y no puede ser editado.');
    }
  }
}

