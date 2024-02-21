<?php

namespace Modules\Token\App\Http\Services;

use App\Exceptions\ValidatorException;
use App\Helper\Shared\ValidateRequest;
use Illuminate\Support\Facades\Validator;

class TokenValidator
{
    private function translator($message): string
    {
        $attribute = [
            '%grant type%'    => 'Grant Type',
            '%client id%'     => 'Client (ID)',
            '%client secret%' => 'Client Secret',
            '%username%'      => 'Email / Username',
            '%password%'      => 'Kata Sandi',
            '%refresh token%' => 'Refresh Token',
        ];

        return str_replace(array_keys($attribute), array_values($attribute), $message);
    }

    public function validate($payload)
    {
        $messages = ValidateRequest::messages();

        $validator = Validator::make($payload, [
            'grant_type'    => 'required|string|in:password,refresh_token',
            'client_id'     => 'required|string|uuid',
            'client_secret' => 'required|string',
            'username'      => 'required_if:grant_type,password|exists:users,email|string|min:3',
            'password'      => 'required_if:grant_type,password|string|min:5',
            'refresh_token' => 'required_if:grant_type,refresh_token|string',
        ], $messages);

        if ($validator->fails()) {
            throw new ValidatorException($this->translator($validator->errors()->first()), 422);
        }
    }
}
