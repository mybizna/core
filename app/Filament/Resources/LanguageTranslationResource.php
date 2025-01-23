<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\LanguageTranslationResource\Pages;
use Modules\Core\Models\LanguageTranslation;

class LanguageTranslationResource extends BaseResource
{
    protected static ?string $model = LanguageTranslation::class;

    protected static ?string $slug = 'core/language/translation';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
