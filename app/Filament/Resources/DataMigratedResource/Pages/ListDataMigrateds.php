<?php

namespace Modules\Core\Filament\Resources\DataMigratedResource\Pages;

use Modules\Core\Filament\Resources\DataMigratedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataMigrateds extends ListRecords
{
    protected static string $resource = DataMigratedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
