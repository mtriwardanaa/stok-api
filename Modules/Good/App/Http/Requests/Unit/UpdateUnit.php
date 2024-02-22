<?php

namespace Modules\Good\App\Http\Requests\Unit;

use App\Helper\Trait\MessageHandle;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUnit extends FormRequest
{
    use MessageHandle;

    public function rules(): array
    {
        return [
            'name' => 'required|iunique:units,name,' . $this->unit->id . '|min:2'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function translator($message): string
    {
        $attribute = [
            '%name%' => 'Nama',
        ];

        return str_replace(array_keys($attribute), array_values($attribute), $message);
    }
}
