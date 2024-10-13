<?php

namespace Modules\Core\Filament\Resources\DataMigratedResource\Pages;

use Modules\Base\Filament\Resources\Pages\EditingBase;
use Modules\Core\Filament\Resources\DataMigratedResource;

// Class List that extends ListBase
class Editing extends EditingBase
{
    protected static string $resource = DataMigratedResource::class;
}
