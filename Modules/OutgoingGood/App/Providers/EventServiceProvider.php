<?php

namespace Modules\OutgoingGood\App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\OutgoingGood\App\Events\OutgoingGoodCreated;
use Modules\OutgoingGood\App\Listeners\CreateGoodHistory;
use Modules\OutgoingGood\App\Listeners\UpdateGoodQty;
use Modules\OutgoingGood\App\Listeners\UpdateTakingGoodStatus;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        OutgoingGoodCreated::class => [
            UpdateGoodQty::class,
            CreateGoodHistory::class,
            UpdateTakingGoodStatus::class,
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
