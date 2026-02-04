<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum DocumentType: string
{
  use BaseEnum;

  case VENEZOLANO = 'venezolano';
  case EXTRANJERO = 'extranjero';
  case PASAPORTE = 'pasaporte';
  case JURIDICO = 'juridico';
  case GUBERNAMENTAL = 'gubernamental';

  public function getLabel(): ?string
  {
    return match ($this) {
      static::VENEZOLANO => 'V',
      static::EXTRANJERO => 'E',
      static::PASAPORTE => 'P',
      static::JURIDICO => 'J',
      static::GUBERNAMENTAL => 'G',
    };
  }
}

