<?php

namespace App\Filament\Resources\Incidents\RelationManagers;

use App\Enums\IncidentStatus;
use BackedEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class UpdatesRelationManager extends RelationManager
{
  protected static string $relationship = 'updates';

  protected static string|BackedEnum|null $icon = Heroicon::OutlinedArrowPath;

  protected static ?string $title = 'Seguimiento de la Incidencia';

  public function form(Schema $schema): Schema
  {
    return $schema
      ->components([
        Select::make('new_status')
          ->label('Cambiar Estado a:')
          ->options(IncidentStatus::class)
          ->required()
          ->native(false)
          ->default(fn (RelationManager $livewire) => $livewire->getOwnerRecord()->status),
        RichEditor::make('comment')
          ->label('Comentario / Justificación')
          ->required()
          ->columnSpanFull()
          ->toolbarButtons(['bold', 'italic', 'bulletList']),
        FileUpload::make('attachments')
          ->label('Evidencias (Fotos/Capturas)')
          ->multiple()
          ->reorderable()
          ->image()
          ->imageEditor()
          ->directory('incident-updates-attachments')
          ->columnSpanFull()
          ->maxFiles(5),
        Hidden::make('user_id')
          ->default(auth()->id()),
        Hidden::make('previous_status')
          ->default(fn (RelationManager $livewire) => $livewire->getOwnerRecord()->status),
      ]);
  }

  public function infolist(Schema $schema): Schema
  {
    return $schema
      ->components([
        Section::make('Detalle del Avance')
          ->schema([
            TextEntry::make('comment')->html()->columnSpanFull(),
            ImageEntry::make('evidence_paths')
              ->label('Fotos adjuntas')
              ->square()
              ->columnSpanFull(),
          ])->columns(2)
      ]);
  }

  public function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('created_at')
          ->label('Fecha')
          ->dateTime('d/m/Y h:i A')
          ->description(fn (Model $record) => $record->user->name)
          ->sortable(),
        TextColumn::make('status_change')
          ->label('Cambio de Estado')
          ->state(function (Model $record) {
            $prev = $record->previous_status?->getLabel() ?? 'N/A';
            $new = $record->new_status->getLabel();
            return "{$prev} → {$new}";
          })
          ->badge()
          ->color('info'),
        ImageColumn::make('attachments')
          ->label('Evidencias')
          ->circular()
          ->stacked()
          ->limit(3)
          ->limitedRemainingText()
      ])
      ->defaultSort('created_at', 'desc')
      ->filters([
        //
      ])
      ->headerActions([
        CreateAction::make()
          ->label('Añadir Avance')
          ->modalHeading('Registrar Seguimiento Técnico'),
      ])
      ->recordActions([
        ActionGroup::make([
          ViewAction::make(),
        ])
      ]);
  }
}

