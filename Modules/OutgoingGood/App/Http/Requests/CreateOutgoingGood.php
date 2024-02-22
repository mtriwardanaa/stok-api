<?php

namespace Modules\OutgoingGood\App\Http\Requests;

use App\Helper\Trait\MessageHandle;
use Illuminate\Foundation\Http\FormRequest;

class CreateOutgoingGood extends FormRequest
{
    use MessageHandle;

    public function rules(): array
    {
        return [
            'taking_good_id'           => 'required|exists:taking_goods,id',
            'good_ids'                 => 'required|array',
            'good_ids.*'               => 'required|exists:goods,id',
            'taking_good_detail_ids'   => 'required|array',
            'taking_good_detail_ids.*' => 'required|exists:taking_good_details,id',
            'qtys'                     => 'required|array',
            'qtys.*'                   => 'required|string|numeric',
            'prices'                   => 'required|array',
            'prices.*'                 => 'required|string|numeric',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function translator($message): string
    {
        $attribute = [
            '%taking good id%'         => 'Pemesanan Barang (ID)',
            '%good ids%'               => 'Barang (ID)',
            '%taking good detail ids%' => 'Detail Pemesanan Barang (ID)',
            '%qtys%'                   => 'Jumlah',
            '%prices%'                 => 'Harga',
        ];

        for ($i = 0; $i < 100; $i++) {
            $attribute['%good_ids.' . $i . '%'] = 'Barang (ID) ' . $i + 1;
            $attribute['%taking_good_detail_ids.' . $i . '%'] = 'Detail Pemesanan Barang (ID) ' . $i + 1;
            $attribute['%qtys.' . $i . '%'] = 'Jumlah ' . $i + 1;
            $attribute['%prices.' . $i . '%'] = 'Harga ' . $i + 1;
        }

        return str_replace(array_keys($attribute), array_values($attribute), $message);
    }
}
