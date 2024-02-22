<?php

namespace Modules\Good\App\Http\Controllers\Good\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Models\Good;

class GoodDelete extends Controller
{
    public function handle(Good $good)
    {
        try {
            return Wrapper::data($good->delete(), 'Delete Good');
        } catch (\Throwable $th) {
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
