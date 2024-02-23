<?php

namespace Modules\Good\Database\Seeders;

use Illuminate\Database\Seeder;

class UnitDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('units')->delete();

        \DB::table('units')->insert(
            array(
                0 =>
                    array(
                        'id'         => '01hq7b1ndfrhs6tr18c7ybfab9',
                        'name'       => 'PCS',
                        'created_at' => '2024-02-22 09:41:52',
                        'updated_at' => '2024-02-22 09:41:52',
                        'deleted_at' => null,
                    ),
            )
        );
    }
}
