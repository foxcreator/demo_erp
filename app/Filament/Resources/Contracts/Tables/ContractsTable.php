<?php

namespace App\Filament\Resources\Contracts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContractsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Назва договору')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('counterparty.name')
                    ->label('Контрагент')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'З покупцем' => 'primary',
                        'З постачальником' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('number')
                    ->label('Номер договору')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Номер скопійовано!'),
                TextColumn::make('currency')
                    ->label('Валюта')
                    ->badge()
                    ->color('success'),
                TextColumn::make('date')
                    ->label('Дата укладання')
                    ->date('d.m.Y')
                    ->sortable(),
                TextColumn::make('valid_until')
                    ->label('Діє до')
                    ->date('d.m.Y')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
