<?php

use App\Helper\ValueObject\Func;
use Modules\Token\App\Http\Controllers\ApiLogout;
use Modules\User\App\Http\Controllers\Query\CurrentUser;
use Modules\User\App\Http\Controllers\Query\UserList;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserList::class, Func::DEFAULT ->value])->middleware(['scopes:users.index']);
        Route::get('current', [CurrentUser::class, Func::DEFAULT ->value])->middleware(['scopes:users.index']);
        Route::get('logout', [ApiLogout::class, Func::DEFAULT ->value]);
    });
});
