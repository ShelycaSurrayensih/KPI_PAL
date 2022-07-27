<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisi')->insert([
                'id_divisi' => '21000',
                'div_name' => 'Divisi Rekayasa Umum',
                'username'=>'rekum',
                'id_direktorat' => '20000',
                'status' => 'admin',
                'password' => Hash::make('rekum2000'),
        ]);
        
        DB::table('divisi')->insert([
            'id_divisi' => '13000',
            'div_name' => 'Divisi Teknologi Informasi',
            'username'=>'divti',
            'id_direktorat' => '10000',
            'status' => 'pic',
            'password' => Hash::make('divti1000'),
    ]);
    }
}