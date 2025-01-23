<?php

namespace Modules\Core\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Models\Timezone;

class TimezoneResource extends BaseResource
{
    protected static ?string $model = Timezone::class;

    protected static ?string $slug = 'core/timezone';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
