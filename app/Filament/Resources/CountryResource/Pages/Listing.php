<?php

namespace Modules\Core\Filament\Resources\CountryResource\Pages;

use Modules\Base\Filament\Resources\Pages\ListingBase;
use Modules\Core\Filament\Resources\CountryResource;

// Class List that extends ListBase
class Listing extends ListingBase
{
    protected static string $resource = CountryResource::class;
}
