<?php

namespace Modules\Core\Filament\Resources\CountryResource\Pages;

use Modules\Base\Filament\Resources\Pages\CreatingBase;
use Modules\Core\Filament\Resources\CountryCurrencyResource;

// Class List that extends ListBase
class Creating extends CreatingBase
{
    protected static string $resource = CountryCurrencyResource::class;
}
