<?php

namespace Modules\Core\Filament\Resources\CountryCurrencyResource\Pages;

use Modules\Core\Filament\Resources\CountryCurrencyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCountryCurrency extends EditRecord
{
    protected static string $resource = CountryCurrencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
