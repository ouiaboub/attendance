<?php

namespace App\Filament\Resources\Shedules\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ShedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('filiere.name')->label('Program')->searchable()->sortable(),
                TextColumn::make('year')->badge()->color('info')->sortable(),
                TextColumn::make('cours.name')->label('Course')->searchable()->sortable(),
                TextColumn::make('day_of_week')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Monday' => 'primary',
                        'Tuesday' => 'success',
                        'Wednesday' => 'warning',
                        'Thursday' => 'danger',
                        'Friday' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('start_time')->time('H:i'),
                TextColumn::make('end_time')->time('H:i'),
                TextColumn::make('room')->toggleable(),
            ])
            ->filters([
                SelectFilter::make('filiere_id')->relationship('filiere', 'name')->multiple(),
                SelectFilter::make('year')->options(['1' => 'Year 1', '2' => 'Year 2', '3' => 'Year 3', '4' => 'Year 4']),
            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}