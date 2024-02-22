<?php

use App\Helper\ValueObject\Func;
use Modules\TakingGood\App\Http\Controllers\Command\TakingGoodCreate;
use Modules\TakingGood\App\Http\Controllers\Query\TakingGoodList;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('taking-goods')->group(function () {
        Route::get('/', [TakingGoodList::class, Func::DEFAULT ->value]);
        Route::get('/{taking_good}', [TakingGoodList::class, 'detail']);
        Route::post('/', [TakingGoodCreate::class, Func::DEFAULT ->value]);
    });
});
