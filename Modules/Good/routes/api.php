<?php

use App\Helper\ValueObject\Func;
use Modules\Good\App\Http\Controllers\Unit\Command\UnitCreate;
use Modules\Good\App\Http\Controllers\Unit\Command\UnitDelete;
use Modules\Good\App\Http\Controllers\Unit\Command\UnitUpdate;
use Modules\Good\App\Http\Controllers\Unit\Query\UnitList;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('units')->group(function () {
        Route::get('/', [UnitList::class, Func::DEFAULT ->value]);
        Route::get('/{unit}', [UnitList::class, 'detail']);
        Route::post('/', [UnitCreate::class, Func::DEFAULT ->value]);
        Route::put('/{unit}', [UnitUpdate::class, Func::DEFAULT ->value]);
        Route::delete('/{unit}', [UnitDelete::class, Func::DEFAULT ->value]);
    });
});
