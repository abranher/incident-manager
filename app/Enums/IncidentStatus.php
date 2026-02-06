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
  case RESOLVED = 'resolved';
  case CLOSED = 'closed';

  public function getLabel(): ?string
  {
    return match ($this) {
      static::NEW => 'Nueva',
      static::ASSIGNED => 'Asignada',
      static::IN_PROGRESS => 'En Progreso',
      static::RESOLVED => 'Resuelta',
      static::CLOSED => 'Cerrada',
    };
  }

  public function getColor(): string|array|null
  {
    return match ($this) {
      static::NEW => 'danger',
      static::ASSIGNED => 'warning',
      static::IN_PROGRESS => 'info',
      static::RESOLVED => 'success',
      static::CLOSED => 'success',
    };
  }
}

