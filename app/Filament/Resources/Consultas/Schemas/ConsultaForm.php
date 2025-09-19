<?php

namespace App\Filament\Resources\Consultas\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ConsultaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Select::make('paciente_id')
                ->label('Paciente')
                ->relationship('paciente', 'name')
                ->required()
                ->searchable(),

            Forms\Components\Select::make('medico_id')
                ->label('Médico')
                ->relationship('medico', 'name')
                ->required()
                ->searchable(),

            Forms\Components\DateTimePicker::make('data_consulta')
                ->label('Data e Hora')
                ->seconds(false)
                ->native(false)
                ->required(),

            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'Agendada' => 'Agendada',
                    'Realizada' => 'Realizada',
                    'Cancelada' => 'Cancelada',
                ])
                ->required()
                ->default('Agendada'),

            Forms\Components\TextInput::make('motivo')
                ->label('Motivo da consulta')
                ->maxLength(255)
                ->required(),

            Forms\Components\Textarea::make('observacoes')
                ->label('Observações')
                ->columnSpanFull()
                ->rows(3),

        ]);
    }
}
