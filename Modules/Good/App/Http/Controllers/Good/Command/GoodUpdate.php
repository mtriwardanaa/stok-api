<?php

namespace Modules\Good\App\Http\Controllers\Good\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Good\App\Http\Requests\Good\UpdateGood;
use Modules\Good\App\Http\Services\CodeGenerator;
use Modules\Good\App\Models\Good;

class GoodUpdate extends Controller
{
    public function handle(UpdateGood $request, Good $good)
    {
        $post = $request->json()->all();
        try {
            $update = array_merge($post, [
                'code' => $post['code'] ?? CodeGenerator::generate(),
            ]);

            return Wrapper::data(tap($good)->update($update), 'Update Good');
        } catch (\Throwable $th) {
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
