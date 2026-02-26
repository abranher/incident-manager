<?php

namespace App\Filament\Resources\Incidents\Pages;

use App\Filament\Resources\Incidents\IncidentResource;
use App\Services\ReportService;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewIncident extends ViewRecord
{
  protected static string $resource = IncidentResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Action::make('download_pdf')
        ->label('Descargar PDF')
        ->color('danger')
        ->icon(Heroicon::OutlinedDocumentArrowDown)
        ->action(fn () =>
          ReportService::download(
            ['incident' => $this->record],
            'reports.incident',
            "incidencia-{$this->record->id}"
          )
        ),
      EditAction::make(),
    ];
  }
}

