<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionUserDatabaseSeeder extends Seeder
{
    public function run()
    {
        \DB::table('permission_users')->delete();

        \DB::table('permission_users')->insert(
            array(
                0 =>
                    array(
                        'user_id'       => '01hq65ejsdkv20mcnv3yjmgywz',
                        'permission_id' => '01hq66jy3f97nd4vz48q0p4yna',
                    ),
                1 =>
                    array(
                        'user_id'       => '01hq65ejsdkv20mcnv3yjmgywz',
                        'permission_id' => '01hq66yda7qapg05g3ttgx56qw',
                    ),
                2 =>
                    array(
                        'user_id'       => '01hq65ejsdkv20mcnv3yjmgywz',
                        'permission_id' => '01hq670ctm2pp07121kt4fbavh',
                    ),
                3 =>
                    array(
                        'user_id'       => '01hq65ejsdkv20mcnv3yjmgywz',
                        'permission_id' => '01hq6725hj5jarv4fy6hzp77rj',
                    ),
                4 =>
                    array(
                        'user_id'       => '01hq65ejsdkv20mcnv3yjmgywz',
                        'permission_id' => '01hq673zdnv2ymhcnv4e2ecpzt',
                    ),
                5 =>
                    array(
                        'user_id'       => '01hq65njwqhdcnn4rsjh7ngyap',
                        'permission_id' => '01hq66jy3f97nd4vz48q0p4yna',
                    ),
                6 =>
                    array(
                        'user_id'       => '01hq65njwqhdcnn4rsjh7ngyap',
                        'permission_id' => '01hq673zdnv2ymhcnv4e2ecpzt',
                    ),
                7 =>
                    array(
                        'user_id'       => '01hq65rtmnj4237w6bhpbcvm04',
                        'permission_id' => '01hq66jy3f97nd4vz48q0p4yna',
                    ),
                8 =>
                    array(
                        'user_id'       => '01hq65rtmnj4237w6bhpbcvm04',
                        'permission_id' => '01hq673zdnv2ymhcnv4e2ecpzt',
                    ),
            )
        );


    }
}
