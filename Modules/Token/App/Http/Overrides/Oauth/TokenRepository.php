<?php

namespace Modules\Token\App\Http\Overrides\Oauth;

use Laravel\Passport\Passport;
use Laravel\Passport\TokenRepository as BaseTokenRepository;

class TokenRepository extends BaseTokenRepository
{
    public function forUserExceptId($userId, $id)
    {
        return Passport::token()->where('id', '!=', $id)->where('user_id', $userId)->pluck('id');
    }

    public function forUserAll($userId)
    {
        return Passport::token()->where('user_id', $userId)->pluck('id');
    }

    public function revokeOldAccessTokens($ids)
    {
        return Passport::token()->whereIn('id', $ids)->update(['revoked' => true]);
    }

    public function grantAccessByToken($id, $scopes)
    {
        return Passport::token()->where('id', $id)->update(['scopes' => $scopes]);
    }

    public function findOrFail($id)
    {
        return Passport::token()->where('id', $id)->firstOrFail();
    }
}
