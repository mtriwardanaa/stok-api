<?php

namespace Modules\Good\App\Http\Controllers\Unit\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Http\Requests\Unit\UpdateUnit;
use Modules\Good\App\Models\Unit;

class UnitUpdate extends Controller
{
    public function handle(UpdateUnit $request, Unit $unit)
    {
        $post = $request->json()->all();

        try {
            return Wrapper::data(tap($unit)->update($post), 'Update Unit');
        } catch (\Throwable $th) {
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
