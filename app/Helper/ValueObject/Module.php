<?php

namespace App\Helper\ValueObject;

class Module
{
    public static function replacement($module): string
    {
        $replace = [
            'Unit' => '(Satuan Barang)',
        ];

        return str_replace(array_keys($replace), array_values($replace), $module);
    }
}