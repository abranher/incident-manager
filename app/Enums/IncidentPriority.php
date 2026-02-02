<?php

namespace App\Enums;

use App\Traits\BaseEnum;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum IncidentPriority: string implements HasLabel, HasColor
{
  use BaseEnum;

  case LOW = 'low';
  case MEDIUM = 'medium';
  case HIGH = 'high';
  case CRITICAL = 'critical';

  public function getLabel(): ?string
  {
    return match ($this) {
      static::LOW => 'Baja',
      static::MEDIUM => 'Media',
      static::HIGH => 'Alta',
      static::CRITICAL => 'Crítica',
    };
  }

  public function getColor(): string|array|null
  {
    return match ($this) {
      static::LOW => 'gray',
      static::MEDIUM => 'info',
      static::HIGH => 'warning',
      static::CRITICAL => 'danger',
    };
  }
}

