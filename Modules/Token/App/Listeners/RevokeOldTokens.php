<?php

namespace Modules\Token\App\Listeners;

use Laravel\Passport\Events\AccessTokenCreated;
use Modules\Token\App\Events\LoggedOut;
use Modules\Token\App\Http\Overrides\Oauth\RefreshTokenRepository;
use Modules\Token\App\Http\Overrides\Oauth\TokenRepository;

class RevokeOldTokens
{
    public bool $afterCommit = true;
    public int $tries = 3;
    public int $timeout = 60;

    protected $tokenRepository;
    protected $refreshTokenRepository;

    public function __construct(
        TokenRepository $tokenRepository,
        RefreshTokenRepository $refreshTokenRepository,
    ) {
        $this->tokenRepository = $tokenRepository;
        $this->refreshTokenRepository = $refreshTokenRepository;
    }
    /**
     * Handle the event.
     */
    public function handle(AccessTokenCreated|LoggedOut $event): void
    {
        $tokenIds = $this->tokenRepository->forUserAll($event->userId);

        if ($event instanceof AccessTokenCreated) {
            $tokenIds = $this->tokenRepository->forUserExceptId($event->userId, $event->tokenId);
        }

        $this->tokenRepository->revokeOldAccessTokens($tokenIds);
        $this->refreshTokenRepository->revokeOldRefreshTokensByAccessTokenIds($tokenIds);
    }
}
