<?php

namespace Modules\Core\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Models\Branch;

class BranchResource extends BaseResource
{
    protected static ?string $model = Branch::class;

    protected static ?string $slug = 'core/branch';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
