<?php

namespace Modules\Core\Filament\Resources\CountryCurrencyResource\Pages;

use Modules\Core\Filament\Resources\CountryCurrencyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCountryCurrencies extends ListRecords
{
    protected static string $resource = CountryCurrencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
