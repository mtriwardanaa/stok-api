<?php

namespace Modules\Good\App\Http\Controllers\Unit\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Http\Requests\Unit\CreateUnit;
use Modules\Good\App\Models\Unit;

class UnitCreate extends Controller
{
    public function __construct(private Unit $unit)
    {
    }

    public function handle(CreateUnit $request)
    {
        $post = $request->json()->all();

        try {
            return Wrapper::data($this->unit->create($post), 'Create Unit');
        } catch (\Throwable $th) {
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
