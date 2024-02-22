<?php

use App\Helper\ValueObject\Func;
use Modules\IncomingGood\App\Http\Controllers\Command\IncomingGoodCreate;
use Modules\IncomingGood\App\Http\Controllers\Query\IncomingGoodList;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('incoming-goods')->group(function () {
        Route::get('/', [IncomingGoodList::class, Func::DEFAULT ->value]);
        Route::get('/{incoming_good}', [IncomingGoodList::class, 'detail']);
        Route::post('/', [IncomingGoodCreate::class, Func::DEFAULT ->value]);
    });
});
