<?php

namespace Modules\Core\Filament\Resources\TimezoneResource\Pages;

use Modules\Core\Filament\Resources\TimezoneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimezone extends EditRecord
{
    protected static string $resource = TimezoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
