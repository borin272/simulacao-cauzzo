<?php

namespace App\Filament\Resources\Consultas\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class ConsultasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('paciente.name')
                    ->label('Paciente')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('medico.name')
                    ->label('Médico/Psicólogo')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('data_consulta')
                    ->label('Data/Hora')
                    ->dateTime('d/m/Y H:i'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'Agendada' => 'warning',
                        'Realizada' => 'success',
                        'Cancelada' => 'danger',
                        default => 'secondary',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()
                        ->color('success'),
                    EditAction::make()
                        ->color('warning'),
                    DeleteAction::make(),
                ])->label('Ações'),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
