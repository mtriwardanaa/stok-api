<?php

namespace Modules\Good\App\Http\Services;

class CodeGenerator
{
    public static function generate()
    {
        $now = now();

        $date = $now->format('Ymd');
        $time = $now->format('su');

        return sprintf(
            'BRG.%s.%s',
            $date,
            $time
        );
    }
}
