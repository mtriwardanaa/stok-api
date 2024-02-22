<?php

namespace Modules\Token\App\Http\Controllers;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Token\App\Events\LoggedOut;

class ApiLogout extends Controller
{
    public function handle(Request $request)
    {
        $userId = auth()->user()->id;
        LoggedOut::dispatch($userId);

        return Wrapper::data(true, 'logout success');
    }
}
