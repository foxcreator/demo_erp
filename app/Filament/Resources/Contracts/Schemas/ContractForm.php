<?php

namespace App\Filament\Resources\Contracts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ContractForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([
                    Section::make('Деталі договору')
                        ->schema([
                            Select::make('counterparty_id')
                                ->label('Контрагент')
                                ->relationship('counterparty', 'name')
                                ->searchable()
                                ->required(),
                            TextInput::make('name')
                                ->label('Найменування')
                                ->required(),
                            TextInput::make('type')
                                ->label('Вид договору'),
                        ])
                        ->columnSpan(2),

                    Section::make('Дані та Терміни')
                        ->schema([
                            TextInput::make('number')
                                ->label('Номер договору'),
                            TextInput::make('currency')
                                ->label('Валюта'),
                            DatePicker::make('date')
                                ->label('Дата укладання')
                                ->native(false),
                            DatePicker::make('valid_until')
                                ->label('Діє до')
                                ->native(false),
                        ])
                        ->columnSpan(1),
                ]),
            ]);
    }
}
