<?php

namespace App\Enums;

enum Role: string
{
  case SUPER_ADMIN = 'super_admin';

  public function label(): string
  {
    return match ($this) {
      static::SUPER_ADMIN => 'Super Administrador',
    };
  }
}

