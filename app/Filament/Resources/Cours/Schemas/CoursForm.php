<?php

namespace App\Filament\Resources\Cours\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;

class CoursForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('teachers')
                    ->label('Assign Teachers')
                    ->multiple()
                    ->relationship(
                        name: 'teachers',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn(Builder $query) =>
                        $query->where('role', 'teacher')->orWhere('role', 'admin')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
