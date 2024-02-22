<?php

namespace Modules\Good\App\Http\Requests\Good;

use App\Helper\Trait\MessageHandle;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGood extends FormRequest
{
    use MessageHandle;

    public function rules(): array
    {
        return [
            'code'        => 'nullable|string',
            'unit_id'     => 'required|exists:units,id',
            'name'        => 'required|string|min:3',
            'price'       => 'required|string|numeric',
            'qty_warning' => 'nullable|string|numeric',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function translator($message): string
    {
        $attribute = [
            '%unit id%'     => 'Satuan Barang (ID)',
            '%name%'        => 'Nama',
            '%price%'       => 'Harga',
            '%qty warning%' => 'Minimal Stok',
            '%code%'        => 'Kode',
        ];

        return str_replace(array_keys($attribute), array_values($attribute), $message);
    }
}
