<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\CurrencyResource\Pages;
use Modules\Core\Models\Currency;

class CurrencyResource extends BaseResource
{
    protected static ?string $model = Currency::class;

    protected static ?string $slug = 'core/currency';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
