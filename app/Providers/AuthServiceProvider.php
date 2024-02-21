<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Role\App\Models\Permission;
use Illuminate\Support\Facades\App;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        if (!App::runningInConsole()) {
            $permissions = Permission::get();
            if ($permissions->count() > 0) {
                $access = [];
                foreach ($permissions as $permission) {
                    $access[$permission->name] = $permission->description;
                }

                Passport::tokensCan($access);
            }

            $expiresAt = config('auth.bearer_expires');
            Passport::tokensExpireIn(now()->addHours($expiresAt));
            Passport::refreshTokensExpireIn(now()->addDays(5));
            Passport::personalAccessTokensExpireIn(now()->addMonths(1));
        }
    }
}
