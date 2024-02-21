<?php
use Modules\User\App\Http\Controllers\Query\CurrentUser;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('current', [CurrentUser::class, 'handle']);

    });
});
