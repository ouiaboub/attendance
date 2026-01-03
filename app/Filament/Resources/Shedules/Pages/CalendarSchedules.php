<?php

namespace App\Filament\Resources\SheduleResource\Pages;

use App\Models\Schedule;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Pages\Page as FilamentPage;
use App\Filament\Resources\Shedules\SheduleResource;
use Illuminate\Contracts\View\View;

class CalendarSchedules extends Page
{
    protected static string $resource = SheduleResource::class;

    // In Filament 4, use this property instead of $view
    protected static ?string $title = 'Schedule Calendar';

    // Remove or comment out the $view property and use getView() method
    protected string $view = 'filament.resources.schedule-resource.pages.calendar-schedules';


    public $selectedFiliere = null;
    public $selectedYear = null;

    public function mount(): void
    {
        //
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back to List')
                ->url(SheduleResource::getUrl('index'))
                ->color('gray')
                ->icon('heroicon-o-arrow-left'),
            
            Action::make('create')
                ->label('Create Schedule')
                ->url(SheduleResource::getUrl('create'))
                ->icon('heroicon-o-plus'),
        ];
    }

    protected function getViewData(): array
    {
        $query = Schedule::with(['filiere', 'cours']);

        if ($this->selectedFiliere) {
            $query->where('filiere_id', $this->selectedFiliere);
        }

        if ($this->selectedYear) {
            $query->where('year', $this->selectedYear);
        }

        $schedules = $query->get()->groupBy('day_of_week');

        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $timeSlots = $this->generateTimeSlots();

        return [
            'schedules' => $schedules,
            'days' => $days,
            'timeSlots' => $timeSlots,
        ];
    }

    private function generateTimeSlots(): array
    {
        $slots = [];
        for ($hour = 8; $hour <= 18; $hour++) {
            $slots[] = sprintf('%02d:00', $hour);
        }
        return $slots;
    }

    public function updatedSelectedFiliere(): void
    {
        // Trigger re-render when filter changes
    }

    public function updatedSelectedYear(): void
    {
        // Trigger re-render when filter changes
    }
}