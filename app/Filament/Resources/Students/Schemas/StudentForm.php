<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

            // USER DATA
            TextInput::make('user.name')
                ->label('Name')
                ->required(),

            TextInput::make('user.email')
                ->label('Email')
                ->email()
                ->required(),

            TextInput::make('user.password')
                ->label('Password')
                ->password()
                ->required(fn ($record) => ! $record)
                ->dehydrated(fn ($state) => filled($state)),

            Hidden::make('user.role')
                ->default('student'),

            // STUDENT DATA
            Select::make('filiere_id')
                ->label('Filiere')
                ->relationship('filiere', 'name')
                ->required(),

            Select::make('year')
                ->label('Academic Year')
                ->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ])
                ->default('1')
                ->required(),
        ]);
    }
}
