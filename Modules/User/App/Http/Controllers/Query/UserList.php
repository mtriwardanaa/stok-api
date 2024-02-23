<?php

namespace Modules\User\App\Http\Controllers\Query;

use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\User\App\Models\User;

class UserList extends Controller
{
    public function __construct(private User $user)
    {
    }

    public function handle()
    {
        $user = $this->user->with('role', 'permissions')
            ->get()->toArray();

        return Wrapper::data($user, 'Current User Detail');
    }
}
