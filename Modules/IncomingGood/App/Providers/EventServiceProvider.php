<?php

namespace Modules\IncomingGood\App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\IncomingGood\App\Events\IncomingGoodCreated;
use Modules\IncomingGood\App\Events\IncomingGoodDeleted;
use Modules\IncomingGood\App\Events\IncomingGoodUpdated;
use Modules\IncomingGood\App\Listeners\CreateGoodHistory;
use Modules\IncomingGood\App\Listeners\DeleteGoodHistory;
use Modules\IncomingGood\App\Listeners\UpdateGoodQty;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        IncomingGoodCreated::class => [
            UpdateGoodQty::class,
            CreateGoodHistory::class,
        ],
        IncomingGoodUpdated::class => [
            UpdateGoodQty::class,
            CreateGoodHistory::class,
        ],
        IncomingGoodDeleted::class => [
            UpdateGoodQty::class,
            DeleteGoodHistory::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
