<?php

namespace Modules\Core\Filament\Resources\DataMigratedResource\Pages;

use Modules\Core\Filament\Resources\DataMigratedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataMigrated extends EditRecord
{
    protected static string $resource = DataMigratedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
