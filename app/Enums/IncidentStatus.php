<?php

namespace App\Enums;

use App\Traits\BaseEnum;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum IncidentStatus: string implements HasLabel, HasColor
{
  use BaseEnum;

  case NEW = 'new';
  case ASSIGNED = 'assigned';
  case IN_PROGRESS = 'in_progress';
  case ON_HOLD = 'on_hold';
  case RESOLVED = 'resolved';
  case CLOSED = 'closed';

  public function getLabel(): ?string
  {
    return match ($this) {
      static::NEW => 'Nuevo',
      static::ASSIGNED => 'Asignado',
      static::IN_PROGRESS => 'En Progreso',
      static::ON_HOLD => 'En Espera',
      static::RESOLVED => 'Resuelto',
      static::CLOSED => 'Cerrado',
    };
  }

  public function getColor(): string|array|null
  {
    return match ($this) {
      static::NEW => 'gray',
      static::ASSIGNED => 'warning',
      static::IN_PROGRESS => 'info',
      static::ON_HOLD => 'danger',
      static::RESOLVED => 'success',
      static::CLOSED => 'success',
    };
  }
}

