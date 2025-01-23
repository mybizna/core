<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\CountryCurrencyResource\Pages;
use Modules\Core\Models\CountryCurrency;

class CountryCurrencyResource extends BaseResource
{
    protected static ?string $model = CountryCurrency::class;

    protected static ?string $slug = 'core/country/currency';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
