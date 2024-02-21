<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as'        => 'passport.',
    'prefix'    => config('passport.path', 'v1'),
    'namespace' => '\Modules\Token\App\Http\Controllers',
], function () {
    Route::post('/tokens', [
        'uses'       => 'ApiLogin@issueToken',
        'as'         => 'token',
        'middleware' => 'throttle',
    ]);
});
