<?php

namespace Modules\User\App\Http\Controllers\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\User\App\Models\User;

class CurrentUser extends Controller
{
    public function __construct(private User $user)
    {
    }

    public function handle()
    {
        $userId = auth()->user()->id;
        $user = $this->user->with('role', 'permissions')
            ->findOrFail($userId)->toArray();

        return Wrapper::data($user, 'Current User Detail');
    }
}
