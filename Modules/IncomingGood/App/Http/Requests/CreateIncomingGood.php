<?php

namespace Modules\IncomingGood\App\Http\Requests;

use App\Helper\Trait\MessageHandle;
use Illuminate\Foundation\Http\FormRequest;

class CreateIncomingGood extends FormRequest
{
    use MessageHandle;

    public function rules(): array
    {
        return [
            'supplier'   => 'required|string',
            'good_ids'   => 'required|array',
            'good_ids.*' => 'required|exists:goods,id',
            'qtys'       => 'required|array',
            'qtys.*'     => 'required|string|numeric',
            'prices'     => 'required|array',
            'prices.*'   => 'required|string|numeric',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function translator($message): string
    {
        $attribute = [
            '%supplier%' => 'Pemasok',
            '%good ids%' => 'Barang (ID)',
            '%qtys%'     => 'Jumlah',
            '%prices%'   => 'Harga',
        ];

        for ($i = 0; $i < 100; $i++) {
            $attribute['%good_ids.' . $i . '%'] = 'Barang (ID) ' . $i + 1;
            $attribute['%qtys.' . $i . '%'] = 'Jumlah ' . $i + 1;
            $attribute['%prices.' . $i . '%'] = 'Harga ' . $i + 1;
        }

        return str_replace(array_keys($attribute), array_values($attribute), $message);
    }
}
