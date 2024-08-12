<?php

namespace Modules\Core\Filament\Resources\LanguageTranslationResource\Pages;

use Modules\Core\Filament\Resources\LanguageTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLanguageTranslation extends EditRecord
{
    protected static string $resource = LanguageTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
