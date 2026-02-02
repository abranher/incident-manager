<?php

namespace App\Traits;

trait BaseEnum
{
  /**
   * Return array with values of Enum
   */
  public static function values(): array
  {
    return collect(self::cases())
      ->values()
      ->toArray();
  }
}

