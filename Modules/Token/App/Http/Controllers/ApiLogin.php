<?php

namespace Modules\Token\App\Http\Controllers;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use Laravel\Passport\Http\Controllers\AccessTokenController as PassportAccessTokenController;
use League\OAuth2\Server\AuthorizationServer;
use Modules\Token\App\Http\Overrides\Oauth\TokenRepository;
use Modules\Token\App\Http\Services\PermissionValidator;
use Modules\Token\App\Http\Services\TokenValidator;
use Modules\User\App\Models\User;
use Psr\Http\Message\ServerRequestInterface;

class ApiLogin extends PassportAccessTokenController
{
    public function __construct(
        AuthorizationServer $server,
        TokenRepository $tokens,
        protected User $user,
        protected TokenValidator $tokenValidator,
        protected PermissionValidator $permissionValidator
    ) {
        $this->server = $server;
        $this->tokens = $tokens;
    }

    public function issueToken(ServerRequestInterface $serverRequestInterface)
    {
        $payload = $serverRequestInterface->getParsedBody();
        $scopes = [];

        $this->tokenValidator->validate($payload);
        if ($payload['grant_type'] === 'password') {
            $user = $this->user->where('email', $payload['username'])->with('permissions')->firstOrFail();
            $this->permissionValidator->check($user);
            foreach ($user->permissions as $permission) {
                $scopes[] = $permission->name;
            }
        }

        $requestToken = $serverRequestInterface->withParsedBody(
            array_merge($serverRequestInterface->getParsedBody(), [
                "scope" => implode(' ', $scopes),
            ])
        );

        try {
            $tokenResponse = parent::issueToken($requestToken);
            $data = json_decode($tokenResponse->getContent(), true);

            return Wrapper::data($data);
        } catch (\Throwable $th) {
            throw new ValidatorException($th->getMessage());
        }
    }
}
