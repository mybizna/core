<?php

namespace Modules\Core\Filament\Resources\CountryResource\Pages;

use Modules\Core\Filament\Resources\CountryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCountry extends CreateRecord
{
    protected static string $resource = CountryResource::class;
}
