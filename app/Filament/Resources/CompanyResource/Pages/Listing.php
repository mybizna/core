<?php

namespace Modules\Core\Filament\Resources\CompanyResource\Pages;

use Modules\Base\Filament\Resources\Pages\ListingBase;
use Modules\Core\Filament\Resources\CompanyResource;

// Class List that extends ListBase
class Listing extends ListingBase
{
    protected static string $resource = CompanyResource::class;
}
