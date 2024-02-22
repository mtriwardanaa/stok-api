<?php

namespace App\Helper\Trait;

use App\Helper\Shared\ValidateRequest;
use App\Exceptions\ValidatorException;
use Illuminate\Contracts\Validation\Validator;

trait MessageHandle
{
    public function messages()
    {
        return ValidateRequest::messages();
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidatorException($this->translator($validator->errors()->first()), 422);
    }
}
