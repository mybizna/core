<?php

namespace Modules\Core\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Models\Setting;

class SettingResource extends BaseResource
{
    protected static ?string $model = Setting::class;

    protected static ?string $slug = 'core/setting';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
