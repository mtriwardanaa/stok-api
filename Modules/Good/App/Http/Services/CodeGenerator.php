<?php

namespace Modules\Good\App\Http\Services;

use Modules\IncomingGood\App\Models\IncomingGood;

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

    public static function generateIncomingNumber()
    {
        $totalIncomingGood = sprintf('%03s', (IncomingGood::whereDate('date', date('Y-m-d'))->count()) + 1);
        $now = now();

        $date = $now->format('d/m/Y');

        return sprintf(
            'WH-IN-%s-%s',
            $date,
            $totalIncomingGood
        );
    }
}
