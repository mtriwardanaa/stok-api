<?php

namespace Modules\Good\App\Http\Controllers\Good\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Http\Requests\Good\CreateGood;
use Modules\Good\App\Http\Services\CodeGenerator;
use Modules\Good\App\Models\Good;

class GoodCreate extends Controller
{
    public function __construct(private Good $good)
    {
    }

    public function handle(CreateGood $request)
    {
        $post = $request->json()->all();
        try {
            $create = array_merge($post, [
                'code' => $post['code'] ?? CodeGenerator::generate(),
            ]);

            return Wrapper::data($this->good->create($create), 'Create Good');
        } catch (\Throwable $th) {
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
