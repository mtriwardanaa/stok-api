<?php

namespace App\Exceptions;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;

class Error implements Arrayable
{
    public function __construct(
        private Request $request,
        private int $code = 500,
        private string $error = '',
    ) {
    }

    public function toArray(): array
    {
        return [
            'status'  => false,
            'message' => $this->error,
            'code'    => $this->code,
        ];
    }
}
