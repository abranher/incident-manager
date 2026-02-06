<?php

namespace App\Filament\Resources\Incidents\Tables;

use App\Enums\IncidentPriority;
use App\Enums\IncidentStatus;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class IncidentsTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title')
          ->label('Incidencia')
          ->searchable()
          ->wrap(),
        TextColumn::make('status')
          ->badge()
          ->sortable(),
        TextColumn::make('priority')
          ->label('Prioridad')
          ->badge()
          ->sortable(),
        TextColumn::make('department.name')
          ->label('Departamento')
          ->sortable()
          ->toggleable(),
        TextColumn::make('reporter.name')
          ->label('Reportado por')
          ->toggleable(),
        TextColumn::make('created_at')
          ->label('Fecha')
          ->date('d/m/Y - g:i A')
          ->sortable(),
      ])
      ->filters([
        SelectFilter::make('status')
          ->options(IncidentStatus::class)
          ->label('Estado'),
        SelectFilter::make('priority')
          ->options(IncidentPriority::class)
          ->label('Prioridad'),
        TrashedFilter::make(),
      ])
      ->recordActions([
        ActionGroup::make([
          ViewAction::make(),
          EditAction::make(),
        ])
      ])
      ->toolbarActions([
        BulkActionGroup::make([
          DeleteBulkAction::make(),
          RestoreBulkAction::make(),
        ]),
      ]);
  }
}
