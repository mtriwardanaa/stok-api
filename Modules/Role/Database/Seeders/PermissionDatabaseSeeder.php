<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionDatabaseSeeder extends Seeder
{
    public function run()
    {
        \DB::table('permissions')->delete();

        \DB::table('permissions')->insert(
            array(
                0 =>
                    array(
                        'id'          => '01hq66jy3f97nd4vz48q0p4yna',
                        'name'        => 'item.index',
                        'label'       => 'Barang',
                        'description' => 'Daftar Barang',
                        'guard'       => 'api',
                        'created_at'  => '2024-02-21 23:05:20',
                        'updated_at'  => '2024-02-21 23:05:23',
                        'deleted_at'  => null,
                    ),
                1 =>
                    array(
                        'id'          => '01hq66yda7qapg05g3ttgx56qw',
                        'name'        => 'item.create',
                        'label'       => 'Barang',
                        'description' => 'Tambah Barang',
                        'guard'       => 'api',
                        'created_at'  => '2024-02-21 23:11:53',
                        'updated_at'  => '2024-02-21 23:11:56',
                        'deleted_at'  => null,
                    ),
                2 =>
                    array(
                        'id'          => '01hq670ctm2pp07121kt4fbavh',
                        'name'        => 'item.update',
                        'label'       => 'Barang',
                        'description' => 'Ubah Barang',
                        'guard'       => 'api',
                        'created_at'  => '2024-02-21 23:12:52',
                        'updated_at'  => '2024-02-21 23:12:55',
                        'deleted_at'  => null,
                    ),
                3 =>
                    array(
                        'id'          => '01hq6725hj5jarv4fy6hzp77rj',
                        'name'        => 'item.delete',
                        'label'       => 'Barang',
                        'description' => 'Hapus Barang',
                        'guard'       => 'api',
                        'created_at'  => '2024-02-21 23:13:24',
                        'updated_at'  => '2024-02-21 23:13:26',
                        'deleted_at'  => null,
                    ),
                4 =>
                    array(
                        'id'          => '01hq673zdnv2ymhcnv4e2ecpzt',
                        'name'        => 'item.view',
                        'label'       => 'Barang',
                        'description' => 'Informasi Barang',
                        'guard'       => 'api',
                        'created_at'  => '2024-02-21 23:14:30',
                        'updated_at'  => '2024-02-21 23:14:32',
                        'deleted_at'  => null,
                    ),
            )
        );


    }
}
