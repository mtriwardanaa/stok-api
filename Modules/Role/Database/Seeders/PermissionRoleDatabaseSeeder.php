<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionRoleDatabaseSeeder extends Seeder
{
    public function run()
    {
        \DB::table('permission_roles')->delete();

        \DB::table('permission_roles')->insert(
            array(
                0 =>
                    array(
                        'role_id'       => '01hq64nw3gk9knh2rzcc408qv1',
                        'permission_id' => '01hq66jy3f97nd4vz48q0p4yna',
                    ),
                1 =>
                    array(
                        'role_id'       => '01hq64nw3gk9knh2rzcc408qv1',
                        'permission_id' => '01hq66yda7qapg05g3ttgx56qw',
                    ),
                2 =>
                    array(
                        'role_id'       => '01hq64nw3gk9knh2rzcc408qv1',
                        'permission_id' => '01hq670ctm2pp07121kt4fbavh',
                    ),
                3 =>
                    array(
                        'role_id'       => '01hq64nw3gk9knh2rzcc408qv1',
                        'permission_id' => '01hq6725hj5jarv4fy6hzp77rj',
                    ),
                4 =>
                    array(
                        'role_id'       => '01hq64nw3gk9knh2rzcc408qv1',
                        'permission_id' => '01hq673zdnv2ymhcnv4e2ecpzt',
                    ),
                5 =>
                    array(
                        'role_id'       => '01hq64t2se8dp9qda5nkvewt2r',
                        'permission_id' => '01hq66jy3f97nd4vz48q0p4yna',
                    ),
                6 =>
                    array(
                        'role_id'       => '01hq64t2se8dp9qda5nkvewt2r',
                        'permission_id' => '01hq673zdnv2ymhcnv4e2ecpzt',
                    ),
                7 =>
                    array(
                        'role_id'       => '01hq64v6z5237504epsjs8tk55',
                        'permission_id' => '01hq66jy3f97nd4vz48q0p4yna',
                    ),
                8 =>
                    array(
                        'role_id'       => '01hq64v6z5237504epsjs8tk55',
                        'permission_id' => '01hq673zdnv2ymhcnv4e2ecpzt',
                    ),
            )
        );


    }
}
