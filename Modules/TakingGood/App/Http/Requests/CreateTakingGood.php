<?php

namespace Modules\TakingGood\App\Http\Requests;

use App\Helper\Trait\MessageHandle;
use Illuminate\Foundation\Http\FormRequest;

class CreateTakingGood extends FormRequest
{
    use MessageHandle;

    public function rules(): array
    {
        return [
            'good_ids'   => 'required|array',
            'good_ids.*' => 'required|exists:goods,id',
            'qtys'       => 'required|array',
            'qtys.*'     => 'required|string|numeric',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function translator($message): string
    {
        $attribute = [
            '%good ids%' => 'Barang (ID)',
            '%qtys%'     => 'Jumlah',
        ];

        for ($i = 0; $i < 100; $i++) {
            $attribute['%good_ids.' . $i . '%'] = 'Barang (ID) ' . $i + 1;
            $attribute['%qtys.' . $i . '%'] = 'Jumlah ' . $i + 1;
        }

        return str_replace(array_keys($attribute), array_values($attribute), $message);
    }
}
