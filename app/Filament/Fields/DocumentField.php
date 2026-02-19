<?php

namespace App\Filament\Fields;

use App\Enums\DocumentType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Illuminate\Validation\Rules\Unique;

class DocumentField
{
  public static function make(): Group
  {
    return Group::make([
      Select::make('document_type')
        ->label('Tipo de Documento')
        ->options(DocumentType::class)
        ->required()
        ->native(false)
        ->live(),
      TextInput::make('document_number')
        ->label('Número de Documento')
        ->required()
        ->numeric()
        ->placeholder('Ej: 25123456')
        ->minLength(7)
        ->maxLength(9)
        ->unique(
          table: 'users',
          ignoreRecord: true,
          modifyRuleUsing: fn (Unique $rule, callable $get) =>
            $rule->where('document_type', $get('document_type'))
        )
        ->validationMessages([
          'unique' => 'Este número de documento ya existe en el sistema.',
        ]),
    ]);
  }
}

