<?php

namespace App\Filament\Resources\Shedules\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Utilities\Get;
use Closure;

class SheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Global Info')
                ->schema([
                    Select::make('filiere_id')
                        ->relationship('filiere', 'name')
                        ->required()
                        ->preload()
                        ->live(),
                    Select::make('year')
                        ->label('Semester')
                        ->options(['1' => '1', '2' => '2', '3' => '3', '4' => '4'])
                        ->required(),
                ])
                ->columns(2)
                ->columnSpanFull(),

            Tabs::make('Weekly Schedule')
                ->tabs([
                    static::createDayTab('Monday'),
                    static::createDayTab('Tuesday'),
                    static::createDayTab('Wednesday'),
                    static::createDayTab('Thursday'),
                    static::createDayTab('Friday'),
                    static::createDayTab('Saturday'),
                ])->columnSpanFull()
        ]);
    }

    protected static function createDayTab(string $day): Tabs\Tab
    {
        return Tabs\Tab::make($day)
            ->schema([
                Repeater::make("items_{$day}")
                    ->label("Courses for $day")
                    ->schema([
                        Select::make('cours_id')
                            ->relationship('cours', 'name')
                            ->required()
                            ->preload()
                            ->searchable(),
                        TextInput::make('room'),
                        TimePicker::make('start_time')
                            ->required()
                            ->seconds(false)
                            ->live(), // Crucial for real-time validation
                        TimePicker::make('end_time')
                            ->required()
                            ->seconds(false)
                            ->after('start_time')
                            ->live(), // Crucial for real-time validation
                    ])
                    ->columns(2)
                    ->itemLabel(fn($state) => ($state['start_time'] ?? 'New') . ' Slot')
                    ->collapsible()
                    
                    ->rules([
                        fn () => function (string $attribute, $value, Closure $fail) use ($day) {
                            if (!is_array($value)) return;

                            // Sort items by start time to make comparison easier
                            $items = collect($value)->sortBy('start_time')->values()->all();

                            for ($i = 0; $i < count($items) - 1; $i++) {
                                $current = $items[$i];
                                $next = $items[$i + 1];

                                if (empty($current['start_time']) || empty($current['end_time']) || 
                                    empty($next['start_time']) || empty($next['end_time'])) {
                                    continue;
                                }

                                // If the start of the next course is earlier than the end of the current one
                                if ($next['start_time'] < $current['end_time']) {
                                    $fail("Overlap detected on {$day}: A course starting at {$next['start_time']} conflicts with the course ending at {$current['end_time']}.");
                                }
                            }
                        },
                    ])
            ]);
    }
}