<?php

namespace Modules\Core\Filament\Resources\LanguageTranslationResource\Pages;

use Modules\Core\Filament\Resources\LanguageTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLanguageTranslations extends ListRecords
{
    protected static string $resource = LanguageTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
