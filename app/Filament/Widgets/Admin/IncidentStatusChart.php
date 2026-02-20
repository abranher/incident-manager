<?php

namespace App\Filament\Widgets\Admin;

use App\Enums\IncidentStatus;
use App\Enums\Role as RoleEnum;
use App\Models\Incident;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class IncidentStatusChart extends ChartWidget
{
  protected ?string $heading = 'Status General de Incidencias';

  protected static ?int $sort = 3;

  protected int|string|array $columnSpan = 'full';

  protected ?string $maxHeight = '300px';

  public static function canView(): bool
  {
    return Auth::user()->hasRole(RoleEnum::SUPER_ADMIN->value);
  }

  protected function getData(): array
  {
    $statuses = IncidentStatus::cases();

    $data = [];
    $labels = [];
    $colors = [];

    foreach ($statuses as $status) {
      $data[] = Incident::where('status', $status->value)->count();

      $labels[] = $status->getLabel();

      $colors[] = match($status->getColor()) {
        'danger' => '#ef4444',
        'warning' => '#f59e0b',
        'info' => '#3b82f6',
        'success' => '#22c55e',
        'gray' => '#94a3b8',
      };
    }

    return [
      'datasets' => [
        [
          'label' => 'Incidencias',
          'data' => $data,
          'backgroundColor' => $colors,
          'borderColor' => 'transparent',
        ],
      ],
      'labels' => $labels,
    ];
  }

  protected function getType(): string
  {
    return 'doughnut';
  }
}

