<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\NotificationResource\Pages;
use Modules\Core\Models\Notification;

class NotificationResource extends BaseResource
{
    protected static ?string $model = Notification::class;

    protected static ?string $slug = 'core/notification';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
