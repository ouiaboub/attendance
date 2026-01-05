<?php

namespace App\Filament\Resources\Shedules\Tables;

use Filament\Tables;
use App\Models\Schedule;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ShedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // 1. Group records and provide a dummy ID for routing
            ->modifyQueryUsing(fn (Builder $query) => 
                $query->selectRaw('MAX(id) as id, filiere_id, year')
                      ->groupBy('filiere_id', 'year')
            )
            ->columns([
                TextColumn::make('filiere.name')
                    ->label('Program')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('year')
                    ->label('Semester')
                    ->badge()
                    ->formatStateUsing(fn ($state) => "Semester {$state}")
                    ->color('info'),

                TextColumn::make('total_courses')
                    ->label('Courses')
                    ->state(fn (Schedule $record) => 
                        Schedule::where('filiere_id', $record->filiere_id)
                                ->where('year', $record->year)
                                ->count()
                    )
                    ->badge(),
            ])
            ->recordActions([
                // 2. Custom View Action pointing to our Calendar Page
                Action::make('view_timetable')
                    ->label('View Calendar')
                    ->icon('heroicon-o-calendar-days')
                    ->color('success')
                    ->url(fn (Schedule $record): string => 
                        route('filament.admin.resources.schedules.view', ['record' => $record->id])
                    ),

                EditAction::make(),
                
                // 3. Custom Delete to remove the entire group
                DeleteAction::make()
                    ->before(fn (Schedule $record) => 
                        Schedule::where('filiere_id', $record->filiere_id)
                                ->where('year', $record->year)
                                ->delete()
                    ),
            ]);
    }
}