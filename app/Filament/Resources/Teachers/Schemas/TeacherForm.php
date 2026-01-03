<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MultiSelect;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(fn ($record) => ! $record) // only on create
                    ->dehydrated(fn ($state) => filled($state)),

                Hidden::make('role')->default('teacher'),

                // Optional: Assign classes to the teacher
                MultiSelect::make('taughtClasses')
                    ->label('Classes')
                    ->relationship('taughtClasses', 'name'),
            ]);
    }
}
