<?php

namespace App\Filament\Resources\Shedules\Pages;

use App\Filament\Resources\Shedules\SheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListShedules extends ListRecords
{
    protected static string $resource = SheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
