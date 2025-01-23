<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\CompanyResource\Pages;
use Modules\Core\Models\Company;

class CompanyResource extends BaseResource
{
    protected static ?string $model = Company::class;

    protected static ?string $slug = 'core/company';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
