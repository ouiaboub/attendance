<?php

namespace App\Filament\Resources\Shedules;

use BackedEnum;
use App\Models\Schedule;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Shedules\Pages\EditShedule;
use App\Filament\Resources\Shedules\Pages\ListShedules;
use App\Filament\Resources\Shedules\Pages\ViewSchedule;
use App\Filament\Resources\Shedules\Pages\CreateShedule;
use App\Filament\Resources\Shedules\Schemas\SheduleForm;
use App\Filament\Resources\Shedules\Tables\ShedulesTable;
use Filament\Schemas\Components\View;

class SheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendar;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::Calendar;

    protected static ?string $slug = 'schedules';

    protected static ?string $recordTitleAttribute = 'filiere_id';
    
    protected static ?string $navigationLabel = 'Schedules';
    
    protected static ?string $modelLabel = 'Schedule';
    
    protected static ?string $pluralModelLabel = 'Schedules';

    public static function form(Schema $schema): Schema
    {
        return SheduleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ShedulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListShedules::route('/'),
            'create' => CreateShedule::route('/create'),
            'edit' => EditShedule::route('/{record}/edit'),
            'view' => ViewSchedule::route('/{record}'),
        ];
    }
}
