<?php

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Base\Events\ModelCreated;
use Modules\Core\Listeners\CoreLanguageCreated;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ModelCreated::class => [
            CoreLanguageCreated::class,
        ],
    ];

}
