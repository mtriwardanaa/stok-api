<?php

use App\Helper\ValueObject\Func;
use Modules\Good\App\Http\Controllers\Good\Command\GoodCreate;
use Modules\Good\App\Http\Controllers\Good\Command\GoodUpdate;
use Modules\Good\App\Http\Controllers\Good\Query\GoodList;
use Modules\Good\App\Http\Controllers\Good\Command\GoodDelete;
use Modules\Good\App\Http\Controllers\Unit\Command\UnitCreate;
use Modules\Good\App\Http\Controllers\Unit\Command\UnitDelete;
use Modules\Good\App\Http\Controllers\Unit\Command\UnitUpdate;
use Modules\Good\App\Http\Controllers\Unit\Query\UnitList;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('units')->group(function () {
        Route::get('/', [UnitList::class, Func::DEFAULT ->value])->middleware(['scopes:units.index']);
        Route::get('/{unit}', [UnitList::class, 'detail'])->middleware(['scopes:units.view']);
        Route::post('/', [UnitCreate::class, Func::DEFAULT ->value])->middleware(['scopes:units.create']);
        Route::put('/{unit}', [UnitUpdate::class, Func::DEFAULT ->value])->middleware(['scopes:units.update']);
        Route::delete('/{unit}', [UnitDelete::class, Func::DEFAULT ->value])->middleware(['scopes:units.delete']);
    });

    Route::prefix('goods')->group(function () {
        Route::get('/', [GoodList::class, Func::DEFAULT ->value])->middleware(['scopes:goods.index']);
        Route::get('/{good}', [GoodList::class, 'detail'])->middleware(['scopes:goods.view']);
        Route::post('/', [GoodCreate::class, Func::DEFAULT ->value])->middleware(['scopes:goods.create']);
        Route::put('/{good}', [GoodUpdate::class, Func::DEFAULT ->value])->middleware(['scopes:goods.update']);
        Route::delete('/{good}', [GoodDelete::class, Func::DEFAULT ->value])->middleware(['scopes:goods.delete']);
    });
});
