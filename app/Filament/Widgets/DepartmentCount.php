<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DepartmentCount extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Departments', Department::count())
                ->description('Total departments')
                ->icon('heroicon-o-building-office')
                ->color('primary'),
        ];
    }
}
