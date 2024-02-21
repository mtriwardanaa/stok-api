<?php

namespace Modules\Token\Database\Seeders;

use Illuminate\Database\Seeder;

class OauthClientDatabaseSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('oauth_clients')->delete();

        \DB::table('oauth_clients')->insert(
            array(
                0 =>
                    array(
                        'id'                     => '9b63eb11-1c3e-45e7-8c5b-e72183448851',
                        'user_id'                => null,
                        'name'                   => 'Laravel Personal Access Client',
                        'secret'                 => 'vqJeXSaBGxaQv6QUNJfDtYQRoYPTgofB2A09sZXw',
                        'provider'               => null,
                        'redirect'               => 'http://localhost',
                        'personal_access_client' => 1,
                        'password_client'        => 0,
                        'revoked'                => 0,
                        'created_at'             => '2024-02-21 16:54:38',
                        'updated_at'             => '2024-02-21 16:54:38',
                    ),
                1 =>
                    array(
                        'id'                     => '9b63eb11-2546-449a-9ee2-cc3691c97374',
                        'user_id'                => null,
                        'name'                   => 'Laravel Password Grant Client',
                        'secret'                 => 'L3mvgt2KabtA2ydGpdK7U7M17TzxXyW6rXIIp1Su',
                        'provider'               => 'users',
                        'redirect'               => 'http://localhost',
                        'personal_access_client' => 0,
                        'password_client'        => 1,
                        'revoked'                => 0,
                        'created_at'             => '2024-02-21 16:54:38',
                        'updated_at'             => '2024-02-21 16:54:38',
                    ),
            )
        );


    }
}
