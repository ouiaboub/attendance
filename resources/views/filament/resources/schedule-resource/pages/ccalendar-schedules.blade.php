<x-filament-panels::page>
    <div class="space-y-4">
        <!-- Filters -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Filter by Program
                    </label>
                    <select wire:model.live="selectedFiliere" 
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                        <option value="">All Programs</option>
                        @foreach(\App\Models\Filiere::all() as $filiere)
                            <option value="{{ $filiere->id }}">{{ $filiere->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Filter by Year
                    </label>
                    <select wire:model.live="selectedYear" 
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                        <option value="">All Years</option>
                        <option value="1">Year 1</option>
                        <option value="2">Year 2</option>
                        <option value="3">Year 3</option>
                        <option value="4">Year 4</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Calendar Grid -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse min-w-max">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-900">
                            <th class="border border-gray-200 dark:border-gray-700 p-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 w-24">
                                Time
                            </th>
                            @foreach($days as $day)
                                <th class="border border-gray-200 dark:border-gray-700 p-3 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    {{ $day }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timeSlots as $timeSlot)
                            <tr>
                                <td class="border border-gray-200 dark:border-gray-700 p-3 text-sm font-medium text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-900">
                                    {{ $timeSlot }}
                                </td>
                                @foreach($days as $day)
                                    <td class="border border-gray-200 dark:border-gray-700 p-2 align-top min-h-24 relative">
                                        @if(isset($schedules[$day]))
                                            @foreach($schedules[$day] as $schedule)
                                                @php
                                                    $startHour = (int) $schedule->start_time->format('H');
                                                    $slotHour = (int) substr($timeSlot, 0, 2);
                                                    $endHour = (int) $schedule->end_time->format('H');
                                                    
                                                    // Check if this schedule starts in this time slot
                                                    $isStartSlot = $startHour == $slotHour;
                                                    
                                                    // Calculate duration in hours
                                                    $duration = $endHour - $startHour;
                                                    if ($schedule->end_time->format('i') > 0) {
                                                        $duration += ($schedule->end_time->format('i') / 60);
                                                    }
                                                    if ($schedule->start_time->format('i') > 0) {
                                                        $duration -= ($schedule->start_time->format('i') / 60);
                                                    }
                                                @endphp

                                                @if($isStartSlot)
                                                    <div class="mb-2 p-2 rounded-lg text-xs bg-primary-100 dark:bg-primary-900 border-l-4 border-primary-500 hover:shadow-md transition-shadow cursor-pointer"
                                                         wire:click="$dispatch('open-modal', { id: 'schedule-{{ $schedule->id }}' })"
                                                         style="min-height: {{ $duration * 60 }}px;">
                                                        <div class="font-semibold text-primary-700 dark:text-primary-300">
                                                            {{ $schedule->cours->name }}
                                                        </div>
                                                        <div class="text-primary-600 dark:text-primary-400 mt-1">
                                                            {{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }}
                                                        </div>
                                                        @if($schedule->room)
                                                            <div class="text-primary-600 dark:text-primary-400 flex items-center gap-1 mt-1">
                                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                                </svg>
                                                                {{ $schedule->room }}
                                                            </div>
                                                        @endif
                                                        <div class="text-primary-600 dark:text-primary-400 mt-1">
                                                            {{ $schedule->filiere->name }} - Year {{ $schedule->year }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Legend -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Legend</h3>
            <div class="flex flex-wrap gap-4 text-xs text-gray-600 dark:text-gray-400">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-primary-100 dark:bg-primary-900 border-l-4 border-primary-500 rounded"></div>
                    <span>Scheduled Class</span>
                </div>
                <div class="flex items-center gap-2">
                    <span>Click on any class to view details</span>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>