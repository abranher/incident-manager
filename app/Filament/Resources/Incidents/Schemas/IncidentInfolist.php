<?php

namespace App\Filament\Resources\Incidents\Schemas;

use App\Enums\Role as RoleEnum;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class IncidentInfolist
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        Section::make('Información General')
          ->schema([
            TextEntry::make('title')
              ->label('Título'),
            TextEntry::make('status')
              ->label('Status')
              ->badge(),
            TextEntry::make('priority')
              ->label('Prioridad')
              ->badge(),
            TextEntry::make('department.name')
              ->label('Departamento'),
            TextEntry::make('created_at')
              ->label('Fecha'),
            TextEntry::make('reporter.name')
              ->label('Reportado por')
              ->hidden(fn () => Auth::user()->hasRole(RoleEnum::EMPLOYEE->value)),
          ])
          ->columns(['sm' => 1, 'md' => 2, 'lg' => 3])
          ->columnSpanFull(),
        Section::make('Descripción')
          ->schema([
            TextEntry::make('description')
              ->hiddenLabel()
              ->markdown()
              ->prose(),
          ])
          ->columnSpanFull(),
        Section::make('Evidencias Adjuntas')
          ->schema([
            ImageEntry::make('attachments')
              ->label('')
              ->hiddenLabel()
              ->imageSize(300)
              ->square(),
            ])
          ->hidden(fn ($record) => empty($record->attachments))
          ->collapsible()
          ->collapsed()
          ->columnSpanFull(),
      ]);
  }
}

