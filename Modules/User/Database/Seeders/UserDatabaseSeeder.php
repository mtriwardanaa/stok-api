<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(
            array(
                0 =>
                    array(
                        'id'                => '01hq65ejsdkv20mcnv3yjmgywz',
                        'role_id'           => '01hq64nw3gk9knh2rzcc408qv1',
                        'name'              => 'Admin',
                        'email'             => 'admin@gmail.com',
                        'email_verified_at' => '2024-02-21 22:46:00',
                        'password'          => '$2a$12$jLwXixzWtQaVcSJHb68ME.lMu2ooEQOh/9VpRYLyzh46aKBiS9NMO',
                        'remember_token'    => null,
                        'created_at'        => '2024-02-21 22:46:06',
                        'updated_at'        => '2024-02-21 22:46:09',
                        'deleted_at'        => null,
                    ),
                1 =>
                    array(
                        'id'                => '01hq65njwqhdcnn4rsjh7ngyap',
                        'role_id'           => '01hq64t2se8dp9qda5nkvewt2r',
                        'name'              => 'Keeper',
                        'email'             => 'keeper@gmail.com',
                        'email_verified_at' => '2024-02-21 22:49:52',
                        'password'          => '$2a$12$3xE6nfX0jl5BVaYuU7fneODqCXNDIc/k1qoFJ8aACdIXOTTZEGx8.',
                        'remember_token'    => null,
                        'created_at'        => '2024-02-21 22:49:55',
                        'updated_at'        => '2024-02-21 22:49:57',
                        'deleted_at'        => null,
                    ),
                2 =>
                    array(
                        'id'                => '01hq65rtmnj4237w6bhpbcvm04',
                        'role_id'           => '01hq64v6z5237504epsjs8tk55',
                        'name'              => 'staff',
                        'email'             => 'staff@gmail.com',
                        'email_verified_at' => '2024-02-21 22:50:46',
                        'password'          => '$2a$12$FGC8kxZVDBawiX44akT9yeEWOjCmMXC3v9whF1L7pQMgDfqiRpg.a',
                        'remember_token'    => null,
                        'created_at'        => '2024-02-21 22:50:49',
                        'updated_at'        => '2024-02-21 22:50:51',
                        'deleted_at'        => null,
                    ),
            )
        );


    }
}
