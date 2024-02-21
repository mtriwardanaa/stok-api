<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    public function run()
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(
            array(
                0 =>
                    array(
                        'id'         => '01hq64nw3gk9knh2rzcc408qv1',
                        'name'       => 'admin',
                        'label'      => 'Admin',
                        'created_at' => '2024-02-21 22:32:58',
                        'updated_at' => '2024-02-21 22:33:09',
                        'deleted_at' => null,
                    ),
                1 =>
                    array(
                        'id'         => '01hq64t2se8dp9qda5nkvewt2r',
                        'name'       => 'keeper',
                        'label'      => 'Keeper',
                        'created_at' => '2024-02-21 22:34:02',
                        'updated_at' => '2024-02-21 22:34:06',
                        'deleted_at' => null,
                    ),
                2 =>
                    array(
                        'id'         => '01hq64v6z5237504epsjs8tk55',
                        'name'       => 'staff',
                        'label'      => 'Staff',
                        'created_at' => '2024-02-21 22:34:33',
                        'updated_at' => '2024-02-21 22:34:38',
                        'deleted_at' => null,
                    ),
            )
        );


    }
}
