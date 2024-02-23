<?php

use App\Helper\ValueObject\Func;
use Modules\IncomingGood\App\Http\Controllers\Command\IncomingGoodCreate;
use Modules\IncomingGood\App\Http\Controllers\Command\IncomingGoodUpdate;
use Modules\IncomingGood\App\Http\Controllers\Query\IncomingGoodList;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('incoming-goods')->group(function () {
        Route::get('/', [IncomingGoodList::class, Func::DEFAULT ->value])->middleware(['scopes:incoming-goods.index']);
        Route::get('/{incoming_good}', [IncomingGoodList::class, 'detail'])->middleware(['scopes:incoming-goods.view']);
        Route::post('/', [IncomingGoodCreate::class, Func::DEFAULT ->value])->middleware(['scopes:incoming-goods.create']);
        Route::put('/{incoming_good}', [IncomingGoodUpdate::class, Func::DEFAULT ->value])->middleware(['scopes:incoming-goods.update']);
    });
});
