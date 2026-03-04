<?php

namespace App\Filament\Resources\Counterparties\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class CounterpartyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(['lg' => 3])->schema([
                    Section::make('Основна інформація')
                        ->icon('heroicon-o-user')
                        ->schema([
                            TextInput::make('name')
                                ->label('Найменування')
                                ->required(),
                            TextInput::make('full_name')
                                ->label('Повне найменування'),
                            TextInput::make('type')
                                ->label('Вид контрагента'),
                        ])
                        ->columnSpan(['lg' => 2]),

                    Section::make('Документи та Реквізити')
                        ->icon('heroicon-o-identification')
                        ->schema([
                            TextInput::make('inn')
                                ->label('ІНН'),
                            TextInput::make('kpp')
                                ->label('КПП / ЄДРПОУ'),
                            TextInput::make('bank_account')
                                ->label('Рахунок IBAN'),
                        ])
                        ->columnSpan(['lg' => 1]),
                ]),

                Section::make('Контактні дані')
                    ->icon('heroicon-o-envelope')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('phone')
                                ->label('Телефон')
                                ->tel(),
                            TextInput::make('email')
                                ->label('Email address')
                                ->email(),
                        ]),
                        Grid::make(2)->schema([
                            Textarea::make('legal_address')
                                ->label('Юридична адреса')
                                ->rows(3),
                            Textarea::make('actual_address')
                                ->label('Фактична адреса')
                                ->rows(3),
                        ]),
                    ]),
            ]);
    }
}
