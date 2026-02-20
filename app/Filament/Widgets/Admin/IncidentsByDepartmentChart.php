<?php

namespace App\Filament\Widgets\Admin;

use App\Enums\Role as RoleEnum;
use App\Models\Department;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class IncidentsByDepartmentChart extends ChartWidget
{
  protected ?string $heading = 'Incidencias por Departamento (Top 7)';

  protected static ?int $sort = 2;

  protected int|string|array $columnSpan = 'full';

  protected ?string $maxHeight = '400px';

  public static function canView(): bool
  {
    return Auth::user()->hasRole(RoleEnum::SUPER_ADMIN->value);
  }

  protected function getData(): array
  {
    $data = Department::withCount('incidents')
              ->orderBy('incidents_count', 'desc')
              ->limit(7)
              ->get();

    return [
      'datasets' => [
        [
          'label' => 'Total de Incidencias',
          'data' => $data->pluck('incidents_count')->toArray(),
        ],
      ],
      'labels' => $data->pluck('name')->toArray(),
    ];
  }

  protected function getType(): string
  {
    return 'bar';
  }

  protected function getOptions(): array
  {
    return [
      'indexAxis' => 'y',
      'scales' => [
        'x' => [ 'display' => false ],
        'y' => [ 'grid' => [ 'display' => false ] ],
      ],
    ];
  }
}

