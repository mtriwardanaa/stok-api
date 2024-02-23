<?php

namespace Modules\Role\App\Http\Controllers\Command;

use App\Exceptions\ValidatorException;
use App\Helper\Wrapper;
use App\Http\Controllers\Controller;
use Modules\Role\App\Http\Requests\CreateRole;
use Modules\Role\App\Models\Role;
use DB;

class RoleCreate extends Controller
{
    public function __construct(private Role $role)
    {
    }

    public function handle(CreateRole $request)
    {
        DB::beginTransaction();
        $post = $request->json()->all();
        try {
            $create = array_merge($post, [
                'name'  => strtolower($post['name']),
                'label' => $post['label'] ?? ucwords($post['name']),
            ]);

            $createRole = $this->role->create($create);
            $createRole->permissions()->attach(array_values(array_unique($post['permission_ids'])));

            DB::commit();
            return Wrapper::data($createRole, 'Create Role');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            throw new ValidatorException($th->getMessage(), $th->getCode() ?? 500);
        }
    }
}
