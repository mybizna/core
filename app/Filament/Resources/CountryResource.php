<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\CountryResource\Pages;
use Modules\Core\Models\Country;

class CountryResource extends BaseResource
{
    protected static ?string $model = Country::class;

    protected static ?string $slug = 'core/country';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
