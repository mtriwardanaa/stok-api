<?php

use App\Helper\ValueObject\Func;
use Modules\Role\App\Http\Controllers\Command\RoleCreate;
use Modules\Role\App\Http\Controllers\Command\RoleDelete;
use Modules\Role\App\Http\Controllers\Command\RoleUpdate;
use Modules\Role\App\Http\Controllers\Query\PermissionList;
use Modules\Role\App\Http\Controllers\Query\RoleList;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleList::class, Func::DEFAULT ->value]);
        Route::get('/{role}', [RoleList::class, 'detail']);
        Route::post('/', [RoleCreate::class, Func::DEFAULT ->value]);
        Route::put('/{role}', [RoleUpdate::class, Func::DEFAULT ->value]);
        Route::delete('/{role}', [RoleDelete::class, Func::DEFAULT ->value]);
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionList::class, Func::DEFAULT ->value]);
    });
});
