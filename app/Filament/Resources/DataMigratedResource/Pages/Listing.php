<?php

namespace Modules\Core\Filament\Resources\DataMigratedResource\Pages;

use Modules\Base\Filament\Resources\Pages\ListingBase;
use Modules\Core\Filament\Resources\DataMigratedResource;

// Class List that extends ListBase
class Listing extends ListingBase
{
    protected static string $resource = DataMigratedResource::class;
}
