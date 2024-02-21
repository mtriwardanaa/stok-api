<?php

namespace Modules\Token\App\Http\Overrides\Oauth;

use Laravel\Passport\Passport;
use Laravel\Passport\RefreshTokenRepository as BaseRefreshTokenRepository;

class RefreshTokenRepository extends BaseRefreshTokenRepository
{
    public function revokeOldRefreshTokensByAccessTokenIds($accessTokenIds)
    {
        Passport::refreshToken()->whereIn('access_token_id', $accessTokenIds)->update(['revoked' => true]);
    }
}
