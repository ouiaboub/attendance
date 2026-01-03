<?php

namespace App\Filament\Resources\Shedules\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class SheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Schedule Information')
                    ->schema([
                        Select::make('filiere_id')
                            ->label('Program/Filiere')
                            ->relationship('filiere', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(fn(Set $set) => $set('year', null)),

                        Select::make('year')
                            ->label('Year')
                            ->options([
                                '1' => 'Year 1',
                                '2' => 'Year 2',
                                '3' => 'Year 3',
                                '4' => 'Year 4',
                            ])
                            ->required()
                            ->native(false),

                        Select::make('cours_id')
                            ->label('Course')
                            ->relationship('cours', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                    ])

                    ->collapsible()
                    ->columnSpanFull()
                    ->columns(3),

                Section::make('Time & Location')
                    ->schema([
                        Select::make('day_of_week')
                            ->options([
                                'Monday' => 'Monday',
                                'Tuesday' => 'Tuesday',
                                'Wednesday' => 'Wednesday',
                                'Thursday' => 'Thursday',
                                'Friday' => 'Friday',
                                'Saturday' => 'Saturday',
                            ])
                            ->required()
                            ->native(false),

                        TimePicker::make('start_time')
                            ->required()
                            ->seconds(false)
                            ->live(),

                        TimePicker::make('end_time')
                            ->required()
                            ->seconds(false)
                            ->after('start_time'),

                        TextInput::make('room')
                            ->placeholder('e.g., Room 101, Lab A'),
                    ])
                    ->columnSpanFull()
                    ->columns(4),
            ]);
    }
}
