<?php

namespace App\Filament\Resources\Roles\Tables;

use App\Enums\Role as RoleEnum;
use App\Filament\Resources\Roles\Pages\EditRole;
use App\Models\Role;
use Filament\Actions\ActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RolesTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->recordUrl(function (Role $record) {
        if ($record->name === RoleEnum::SUPER_ADMIN->value) return null;
        return EditRole::getUrl([$record]);
      })
      ->columns([
        TextColumn::make('name')
          ->label('Nombre')
          ->searchable()
          ->badge()
          ->formatStateUsing(function (string $state): string {
            $enumCase = RoleEnum::tryFrom($state);
            return $enumCase ? $enumCase->label() : $state;
          })
          ->color(fn (string $state): string =>
            $state === RoleEnum::SUPER_ADMIN->value
              ? 'primary'
              : 'gray'
          )
          ->icon(fn (string $state): string =>
            $state === RoleEnum::SUPER_ADMIN->value
              ? 'heroicon-m-shield-check'
              : 'heroicon-m-user-group'
          ),
        TextColumn::make('created_at')
          ->label('Fecha de creación')
          ->sortable()
          ->date('d/m/Y - g:i A')
          ->timezone('America/Caracas'),
        TextColumn::make('updated_at')
          ->label('Última actualización')
          ->sortable()
          ->date('d/m/Y - g:i A')
          ->timezone('America/Caracas'),
      ])
      ->filters([
        //
      ])
      ->recordActions([
        ActionGroup::make([
          EditAction::make()
            ->hidden(fn(Role $record) => $record->name === RoleEnum::SUPER_ADMIN->value),
        ]),
      ]);
  }
}

