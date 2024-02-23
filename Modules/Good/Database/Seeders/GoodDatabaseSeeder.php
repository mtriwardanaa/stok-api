<?php

namespace Modules\Good\Database\Seeders;

use Illuminate\Database\Seeder;

class GoodDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('goods')->delete();

        \DB::table('goods')->insert(
            array(
                0 =>
                    array(
                        'id'          => '01hqb5myt4zx0fa6m1qhwsm8ew',
                        'unit_id'     => '01hq7b1ndfrhs6tr18c7ybfab9',
                        'name'        => 'Router',
                        'price'       => '130000',
                        'qty'         => '0',
                        'qty_warning' => '0',
                        'code'        => 'BRG.20240223.30530197',
                        'created_at'  => '2024-02-23 21:24:30',
                        'updated_at'  => '2024-02-23 21:24:30',
                        'deleted_at'  => null,
                    ),
            )
        );
    }
}
