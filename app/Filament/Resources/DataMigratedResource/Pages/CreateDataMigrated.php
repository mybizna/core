<?php

namespace Modules\Core\Filament\Resources\DataMigratedResource\Pages;

use Modules\Core\Filament\Resources\DataMigratedResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataMigrated extends CreateRecord
{
    protected static string $resource = DataMigratedResource::class;
}
