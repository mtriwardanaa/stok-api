<?php

namespace Modules\Token\App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Token\App\Events\LoggedOut;
use Modules\Token\App\Listeners\RevokeOldTokens;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        LoggedOut::class => [
            RevokeOldTokens::class,
        ],
    ];
}
