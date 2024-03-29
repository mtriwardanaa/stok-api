<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Good\Database\Seeders\GoodDatabaseSeeder;
use Modules\Good\Database\Seeders\UnitDatabaseSeeder;
use Modules\Role\Database\Seeders\PermissionDatabaseSeeder;
use Modules\Role\Database\Seeders\PermissionRoleDatabaseSeeder;
use Modules\Role\Database\Seeders\PermissionUserDatabaseSeeder;
use Modules\Role\Database\Seeders\RoleDatabaseSeeder;
use Modules\Token\Database\Seeders\OauthClientDatabaseSeeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleDatabaseSeeder::class);
        $this->call(UserDatabaseSeeder::class);
        $this->call(PermissionDatabaseSeeder::class);
        $this->call(PermissionRoleDatabaseSeeder::class);
        $this->call(PermissionUserDatabaseSeeder::class);
        $this->call(OauthClientDatabaseSeeder::class);
        $this->call(UnitDatabaseSeeder::class);
        $this->call(GoodDatabaseSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionUsersTableSeeder::class);
        $this->call(PermissionRolesTableSeeder::class);
    }
}
