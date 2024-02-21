<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ValidatorException extends Exception
{
    public function render(Request $request): Response
    {
        $error = new Error(
            request: $request,
            code: $this->getCode() ?? 500,
            error: trans($this->getMessage()),
        );

        return response($error->toArray(), $this->getCode() ?? 500);
    }
}
