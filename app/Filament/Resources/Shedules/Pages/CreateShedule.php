<?php

namespace App\Filament\Resources\Shedules\Pages;

use App\Filament\Resources\Shedules\SheduleResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateShedule extends CreateRecord
{
    protected static string $resource = SheduleResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $mainRecord = null;

        foreach ($days as $day) {
            $key = "items_{$day}";

            if (!isset($data[$key])) continue;

            foreach ($data[$key] as $item) {
                $newSchedule = \App\Models\Schedule::create([
                    'filiere_id'  => $data['filiere_id'],
                    'year'        => $data['year'],
                    'day_of_week' => $day,
                    'cours_id'    => $item['cours_id'],
                    'start_time'  => $item['start_time'],
                    'end_time'    => $item['end_time'],
                    'room'        => $item['room'],
                ]);

                $mainRecord ??= $newSchedule;
            }
        }

        return $mainRecord;
    }

    protected function beforeCreate(): void
    {
        $data = $this->data;
        $filiereId = $data['filiere_id'];
        $year = $data['year'];

        foreach ($data['items'] as $item) {
            $exists = \App\Models\Schedule::where('filiere_id', $filiereId)
                ->where('year', $year)
                ->where('day_of_week', $item['day_of_week'])
                ->where(function ($query) use ($item) {
                    $query->whereBetween('start_time', [$item['start_time'], $item['end_time']])
                        ->orWhereBetween('end_time', [$item['start_time'], $item['end_time']])
                        ->orWhere(function ($q) use ($item) {
                            $q->where('start_time', '<=', $item['start_time'])
                                ->where('end_time', '>=', $item['end_time']);
                        });
                })
                ->exists();

            if ($exists) {
                \Filament\Notifications\Notification::make()
                    ->title('Scheduling Conflict')
                    ->body("A course already exists for this program at this time on {$item['day_of_week']}.")
                    ->danger()
                    ->send();

                $this->halt(); // Stops the creation process
            }
        }
    }
}
