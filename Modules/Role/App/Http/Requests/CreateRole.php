<?php

namespace Modules\Role\App\Http\Requests;

use App\Helper\Trait\MessageHandle;
use Illuminate\Foundation\Http\FormRequest;

class CreateRole extends FormRequest
{
    use MessageHandle;

    public function rules(): array
    {
        return [
            'name'             => 'required|string|iunique:roles,name',
            'label'            => 'nullable|string',
            'permission_ids'   => 'required|array',
            'permission_ids.*' => 'required|exists:permissions,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function translator($message): string
    {
        $attribute = [
            '%name%'           => 'Nama',
            '%label%'          => 'Label',
            '%permission ids%' => 'Keizinan (ID)',
        ];

        for ($i = 0; $i < 100; $i++) {
            $attribute['%permission_ids.' . $i . '%'] = 'Keizinan (ID) ' . $i + 1;
        }

        return str_replace(array_keys($attribute), array_values($attribute), $message);
    }
}
