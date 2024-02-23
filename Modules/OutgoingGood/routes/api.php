<?php

use App\Helper\ValueObject\Func;
use Modules\OutgoingGood\App\Http\Controllers\Command\OutgoingGoodCreate;
use Modules\OutgoingGood\App\Http\Controllers\Query\OutgoingGoodList;

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::prefix('outgoing-goods')->group(function () {
        Route::get('/', [OutgoingGoodList::class, Func::DEFAULT ->value])->middleware(['scopes:outgoing-goods.index']);
        Route::get('/{outgoing_good}', [OutgoingGoodList::class, 'detail'])->middleware(['scopes:outgoing-goods.view']);
        Route::post('/', [OutgoingGoodCreate::class, Func::DEFAULT ->value])->middleware(['scopes:outgoing-goods.create']);
    });
});
