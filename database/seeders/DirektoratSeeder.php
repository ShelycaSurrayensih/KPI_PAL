<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Direktorat;

class DirektoratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('direktorat')->insert([
            'id_direktorat' => ('10000'),
            'nama' => ('Direktorat Utama'),
        ]);
        DB::table('direktorat')->insert([
            'id_direktorat' => ('20000'),
            'nama' => ('Direktorat Produksi'),
        ]);
        DB::table('direktorat')->insert([
            'id_direktorat' => ('30000'),
            'nama' => ('Direktorat Pemasaran'),
        ]);
        DB::table('direktorat')->insert([
            'id_direktorat' => ('40000'),
            'nama' => ('Direktorat Kauangan, Manajemen Risiko dan SDM'),
        ]);

    }
}
