<?php

namespace App\Filament\Resources\Filieres\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FiliereForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('department_id')
                    ->relationship('department', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('chef_id')
                    ->relationship('chef', 'name',
                        fn ($query) => $query->whereIn('role', ['teacher', 'admin'])
                    )
                    ->required(),
            ]);
    }
}


