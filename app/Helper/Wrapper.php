<?php

namespace App\Helper;

class Wrapper
{
    public static function data(mixed $data, string $message = 'success', int $httpCode = 200)
    {
        $data = [
            'status'   => true,
            'data'     => $data,
            'messages' => [$message],
            'httpCode' => $httpCode,
        ];

        return response()->json($data, $httpCode);
    }
}
