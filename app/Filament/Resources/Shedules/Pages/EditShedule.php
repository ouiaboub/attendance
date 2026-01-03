<?php

namespace App\Filament\Resources\Shedules\Pages;

use App\Filament\Resources\Shedules\SheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditShedule extends EditRecord
{
    protected static string $resource = SheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

        protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('calendar');
    }
}
