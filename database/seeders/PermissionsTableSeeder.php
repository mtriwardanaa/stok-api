<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => '01hq66jy3f97nd4vz48q0p4yna',
                'name' => 'goods.index',
                'label' => 'Barang',
                'description' => 'Daftar Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:05:20',
                'updated_at' => '2024-02-21 23:05:23',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '01hq66yda7qapg05g3ttgx56qw',
                'name' => 'goods.create',
                'label' => 'Barang',
                'description' => 'Tambah Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:11:53',
                'updated_at' => '2024-02-21 23:11:56',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '01hq670ctm2pp07121kt4fbavh',
                'name' => 'goods.update',
                'label' => 'Barang',
                'description' => 'Ubah Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:12:52',
                'updated_at' => '2024-02-21 23:12:55',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '01hq6725hj5jarv4fy6hzp77rj',
                'name' => 'goods.delete',
                'label' => 'Barang',
                'description' => 'Hapus Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:13:24',
                'updated_at' => '2024-02-21 23:13:26',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => '01hq673zdnv2ymhcnv4e2ecpzt',
                'name' => 'goods.view',
                'label' => 'Barang',
                'description' => 'Informasi Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:14:30',
                'updated_at' => '2024-02-21 23:14:32',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => '01hqb6b5qmpd2594j5q6rhxvdd',
                'name' => 'roles.index',
                'label' => 'Role',
                'description' => 'Daftar Role',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:05:20',
                'updated_at' => '2024-02-21 23:05:23',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => '01hqb6c373ymda31zp6n0dcg5w',
                'name' => 'roles.create',
                'label' => 'Role',
                'description' => 'Tambah Role',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:11:53',
                'updated_at' => '2024-02-21 23:11:56',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => '01hqb6c375ega3hq52rrk9146v',
                'name' => 'roles.delete',
                'label' => 'Role',
                'description' => 'Hapus Role',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:13:24',
                'updated_at' => '2024-02-21 23:13:26',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => '01hqb6c375n2zzhyb17bvx0nd6',
                'name' => 'roles.update',
                'label' => 'Role',
                'description' => 'Ubah Role',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:12:52',
                'updated_at' => '2024-02-21 23:12:55',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => '01hqb6c3761kxfdy66htnqz8sm',
                'name' => 'units.delete',
                'label' => 'Unit',
                'description' => 'Hapus Unit',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:13:24',
                'updated_at' => '2024-02-21 23:13:26',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => '01hqb6c3763xd94q9w958ndan5',
                'name' => 'taking-goods.index',
                'label' => 'Ambil Barang',
                'description' => 'Daftar Ambil Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:05:20',
                'updated_at' => '2024-02-21 23:05:23',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => '01hqb6c3763z3gsf1wpdz1jv1q',
                'name' => 'roles.view',
                'label' => 'Role',
                'description' => 'Informasi Role',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:14:30',
                'updated_at' => '2024-02-21 23:14:32',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => '01hqb6c376dv4hgzehnp22ytcx',
                'name' => 'units.update',
                'label' => 'Unit',
                'description' => 'Ubah Unit',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:12:52',
                'updated_at' => '2024-02-21 23:12:55',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => '01hqb6c376q1y5wfe71c6427kc',
                'name' => 'units.view',
                'label' => 'Unit',
                'description' => 'Informasi Unit',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:14:30',
                'updated_at' => '2024-02-21 23:14:32',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => '01hqb6c376sxjfaag2pgw74b6h',
                'name' => 'units.create',
                'label' => 'Unit',
                'description' => 'Tambah Unit',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:11:53',
                'updated_at' => '2024-02-21 23:11:56',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => '01hqb6c376xxn635yxe60mmrvx',
                'name' => 'units.index',
                'label' => 'Unit',
                'description' => 'Daftar Unit',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:05:20',
                'updated_at' => '2024-02-21 23:05:23',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => '01hqb6c3770fzpp85qd73bkqx6',
                'name' => 'taking-goods.update',
                'label' => 'Ambil Barang',
                'description' => 'Ubah Ambil Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:12:52',
                'updated_at' => '2024-02-21 23:12:55',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => '01hqb6c3770wrny4hrbmj2j8rf',
                'name' => 'incoming-goods.update',
                'label' => 'Barang Masuk',
                'description' => 'Ubah Barang Masuk',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:12:52',
                'updated_at' => '2024-02-21 23:12:55',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => '01hqb6c377645phje1jvqza19s',
                'name' => 'taking-goods.delete',
                'label' => 'Ambil Barang',
                'description' => 'Hapus Ambil Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:13:24',
                'updated_at' => '2024-02-21 23:13:26',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => '01hqb6c3778xhdr0v12m77104h',
                'name' => 'outgoing-goods.update',
                'label' => 'Barang Keluar',
                'description' => 'Ubah Barang Keluar',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:12:52',
                'updated_at' => '2024-02-21 23:12:55',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => '01hqb6c377c3a8fy0ax1qpcxac',
                'name' => 'incoming-goods.delete',
                'label' => 'Barang Masuk',
                'description' => 'Hapus Barang Masuk',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:13:24',
                'updated_at' => '2024-02-21 23:13:26',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => '01hqb6c377e3091dhn6ngh99wh',
                'name' => 'incoming-goods.view',
                'label' => 'Barang Masuk',
                'description' => 'Informasi Barang Masuk',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:14:30',
                'updated_at' => '2024-02-21 23:14:32',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => '01hqb6c377jsbn5n6w8x797jx8',
                'name' => 'taking-goods.view',
                'label' => 'Ambil Barang',
                'description' => 'Informasi Ambil Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:14:30',
                'updated_at' => '2024-02-21 23:14:32',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => '01hqb6c377jve5rjepqdqnje2s',
                'name' => 'incoming-goods.create',
                'label' => 'Barang Masuk',
                'description' => 'Tambah Barang Masuk',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:11:53',
                'updated_at' => '2024-02-21 23:11:56',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => '01hqb6c377jzq47mv0z8dxhydf',
                'name' => 'taking-goods.create',
                'label' => 'Ambil Barang',
                'description' => 'Tambah Ambil Barang',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:11:53',
                'updated_at' => '2024-02-21 23:11:56',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => '01hqb6c377ncf7zt5xv1vadtsq',
                'name' => 'outgoing-goods.create',
                'label' => 'Barang Keluar',
                'description' => 'Tambah Barang Keluar',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:11:53',
                'updated_at' => '2024-02-21 23:11:56',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => '01hqb6c377q8vwpyfh0dvzt33s',
                'name' => 'incoming-goods.index',
                'label' => 'Barang Masuk',
                'description' => 'Daftar Barang Masuk',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:05:20',
                'updated_at' => '2024-02-21 23:05:23',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => '01hqb6c377tqbapagraxfnzr9p',
                'name' => 'outgoing-goods.index',
                'label' => 'Barang Keluar',
                'description' => 'Daftar Barang Keluar',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:05:20',
                'updated_at' => '2024-02-21 23:05:23',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => '01hqb6c378221k9zzx72wdnd6k',
                'name' => 'outgoing-goods.delete',
                'label' => 'Barang Keluar',
                'description' => 'Hapus Barang Keluar',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:13:24',
                'updated_at' => '2024-02-21 23:13:26',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => '01hqb6c378yqpp17kt0apydgpd',
                'name' => 'outgoing-goods.view',
                'label' => 'Barang Keluar',
                'description' => 'Informasi Barang Keluar',
                'guard' => 'api',
                'created_at' => '2024-02-21 23:14:30',
                'updated_at' => '2024-02-21 23:14:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}