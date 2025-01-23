<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\LanguageResource\Pages;
use Modules\Core\Models\Language;

class LanguageResource extends BaseResource
{
    protected static ?string $model = Language::class;

    protected static ?string $slug = 'core/language';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
