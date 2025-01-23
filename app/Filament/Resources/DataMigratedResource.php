<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\DataMigratedResource\Pages;
use Modules\Core\Models\DataMigrated;

class DataMigratedResource extends BaseResource
{
    protected static ?string $model = DataMigrated::class;

    protected static ?string $slug = 'core/data_migrated';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
