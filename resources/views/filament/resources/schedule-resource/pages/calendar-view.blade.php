@vite('resources/css/app.css')

<x-filament-panels::page>
    <div class="bg-white dark:bg-gray-900 shadow-xl rounded-2xl border border-gray-200 dark:border-gray-800 overflow-hidden">
        <div class="overflow-x-auto">
            <div class="min-w-[1000px] p-6">
                
                {{-- Headers --}}
                <div class="flex border-b border-gray-100 dark:border-gray-800 pb-2 mb-2">
                    <div class="w-32 flex-shrink-0 font-bold text-gray-400 dark:text-gray-500 uppercase text-[10px] tracking-widest">Day / Time</div>
                    <div class="flex-1 flex relative">
                        @for($i = $startHour; $i < $endHour; $i++)
                            <div class="flex-1 text-center text-[10px] font-bold text-gray-400 dark:text-gray-500 border-l border-gray-100 dark:border-gray-800">
                                {{ sprintf('%02d:00', $i) }}
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Day Rows --}}
                <div class="space-y-4">
                    @foreach($days as $day)
                        <div class="flex items-center group">
                            <div class="w-32 flex-shrink-0 font-bold text-gray-700 dark:text-gray-300 pr-4">
                                {{ $day }}
                            </div>

                            {{-- Track Container --}}
                            <div class="flex-1 h-20 bg-gray-50 dark:bg-gray-800/40 rounded-xl relative border border-gray-100 dark:border-gray-700 shadow-inner">
                                
                                {{-- Grid Lines: z-0 --}}
                                <div class="absolute inset-0 flex pointer-events-none z-0">
                                    @for($i = $startHour; $i < $endHour; $i++)
                                        <div class="flex-1 border-r border-gray-200/40 dark:border-gray-700/30 last:border-r-0"></div>
                                    @endfor
                                </div>

                                {{-- Course Blocks: z-10 --}}
                                @if(isset($schedules[$day]))
                                    @foreach($schedules[$day] as $item)
                                        @php
                                            $totalMinutes = ($endHour - $startHour) * 60;
                                            $start = \Carbon\Carbon::parse($item->start_time);
                                            $end = \Carbon\Carbon::parse($item->end_time);
                                            $startPosMinutes = (($start->hour - $startHour) * 60) + $start->minute;
                                            $durationMinutes = $start->diffInMinutes($end);
                                            $left = ($startPosMinutes / $totalMinutes) * 100;
                                            $width = ($durationMinutes / $totalMinutes) * 100;
                                        @endphp

                                        <div class="absolute top-2 bottom-2 rounded-lg border-l-4 border-primary-600 bg-white dark:bg-gray-700 shadow-sm ring-1 ring-gray-950/5 dark:ring-white/10 flex flex-col justify-center px-3 z-10 hover:z-20 transition-all hover:scale-[1.01] cursor-default"
                                             style="left: {{ $left }}%; width: {{ $width }}%;">
                                            <span class="text-[11px] font-bold text-gray-900 dark:text-gray-100 truncate leading-none">
                                                {{ $item->cours->name }}
                                            </span>
                                            <div class="flex items-center gap-1 mt-1 text-[9px] text-primary-600 dark:text-primary-400 font-bold uppercase tracking-tighter">
                                                <span>{{ $start->format('H:i') }}</span>
                                                <span class="opacity-50">-</span>
                                                <span>{{ $end->format('H:i') }}</span>
                                            </div>
                                            @if($item->room)
                                                <span class="text-[9px] text-gray-500 dark:text-gray-400 italic truncate">{{ $item->room }}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>