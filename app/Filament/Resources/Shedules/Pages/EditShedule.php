<?php

namespace App\Filament\Resources\Shedules\Pages;

use App\Filament\Resources\Shedules\SheduleResource;
use App\Models\Schedule;
use Filament\Resources\Pages\EditRecord;

class EditShedule extends EditRecord
{
    protected static string $resource = SheduleResource::class;

    /**
     * This runs BEFORE the form is shown to the user.
     * We fetch all courses for the group and put them in the tabs.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // 1. Find all courses for this specific Program and Year
        $allCourses = Schedule::where('filiere_id', $data['filiere_id'])
            ->where('year', $data['year'])
            ->get();

        // 2. Map the database rows into our Repeater keys (items_Monday, etc.)
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        
        foreach ($days as $day) {
            $data["items_{$day}"] = $allCourses->where('day_of_week', $day)->map(function ($item) {
                return [
                    'cours_id' => $item->cours_id,
                    'room' => $item->room,
                    'start_time' => $item->start_time,
                    'end_time' => $item->end_time,
                ];
            })->toArray();
        }

        return $data;
    }

    /**
     * This runs when the user clicks "Save".
     */
    protected function handleRecordUpdate(\Illuminate\Database\Eloquent\Model $record, array $data): \Illuminate\Database\Eloquent\Model
    {
        // 1. Clear the old schedule for this group to prevent duplicates
        Schedule::where('filiere_id', $data['filiere_id'])
            ->where('year', $data['year'])
            ->delete();

        // 2. Save the new entries from all 6 tabs
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        foreach ($days as $day) {
            if (!isset($data["items_{$day}"])) continue;

            foreach ($data["items_{$day}"] as $item) {
                Schedule::create([
                    'filiere_id'  => $data['filiere_id'],
                    'year'        => $data['year'],
                    'day_of_week' => $day,
                    'cours_id'    => $item['cours_id'],
                    'start_time'  => $item['start_time'],
                    'end_time'    => $item['end_time'],
                    'room'        => $item['room'],
                ]);
            }
        }

        return $record;
    }
}