<?php

namespace Modules\Good\App\Http\Services;

use Modules\IncomingGood\App\Models\IncomingGood;
use Modules\TakingGood\App\Models\TakingGood;

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

    public static function generateTakingNumber()
    {
        $totalTakingGood = sprintf('%03s', (TakingGood::whereDate('date', date('Y-m-d'))->count()) + 1);
        $now = now();

        $date = $now->format('d/m/Y');

        return sprintf(
            'ORD-%s-%s',
            $date,
            $totalTakingGood
        );
    }
}
