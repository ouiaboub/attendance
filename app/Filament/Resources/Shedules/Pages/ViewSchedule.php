<?php

namespace App\Filament\Resources\Shedules\Pages;

use App\Filament\Resources\Shedules\SheduleResource;
use App\Models\Schedule;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewSchedule extends ViewRecord
{
    protected static string $resource = SheduleResource::class;

    protected string $view = 'filament.resources.schedule-resource.pages.calendar-view';

    /**
     * Correct way to set a dynamic title in Filament
     */
    public function getTitle(): string | Htmlable
    {
        $record = $this->getRecord();
        
        return "Schedule for " . $record->filiere->name . " (S " . $record->year . ")";
    }

    // public function getBreadcrumb(): string
    // {
    //     $record = $this->getRecord();
    //     return $record->filiere->name;
    // }

    protected function getViewData(): array
    {
        $record = $this->getRecord();

        $schedules = Schedule::where('filiere_id', $record->filiere_id)
            ->where('year', $record->year)
            ->with(['cours'])
            ->get()
            ->groupBy('day_of_week');

        return [
            'schedules' => $schedules,
            'days' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'startHour' => 8,
            'endHour' => 18,
            'record' => $record,
        ];
    }
}