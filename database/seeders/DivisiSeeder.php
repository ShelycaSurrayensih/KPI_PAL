<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisi=[
            [
                'id_divisi' => '11000',
                'div_name' => 'Sekretaris Perusahaan',
                'username'=>'sekper',
                'id_direktorat' => '10000',
                
        ],
        [
            'id_divisi' => '12000',
            'div_name' => 'Satuan Pengawasan Intern',
            'username'=>'spi',
            'id_direktorat' => '10000',
        ],
        [
            'id_divisi' => '13000',
            'div_name' => 'Divisi Teknologi Informasi',
            'username'=>'divti',
            'id_direktorat' => '10000',
        ],
        [
            'id_divisi' => '14000',
            'div_name' => 'Divisi Desain',
            'username'=>'divti',
            'id_direktorat' => '10000',
        ],
        [
            'id_divisi' => '21000',
            'div_name' => 'Divisi Rekayasa Umum',
            'username'=>'rekum',
            'id_direktorat' => '20000',
        ],
        [
            'id_divisi' => '22000',
            'div_name' => 'Divisi Kapal Niaga',
            'username'=>'kania',
            'id_direktorat' => '20000',
        ],
        [
            'id_divisi' => '23000',
            'div_name' => 'Divisi Kapal Perang',
            'username'=>'kaprang',
            'id_direktorat' => '20000',
        ],
        [
            'id_divisi' => '24000',
            'div_name' => 'Divisi Kapal Selam',
            'username'=>'kasel',
            'id_direktorat' => '20000',
        ],
        [
            'id_divisi' => '25000',
            'div_name' => 'Divisi Pemeliharaan dan Perbaikan',
            'username'=>'harkan',
            'id_direktorat' => '20000',
        ],
        [
            'id_divisi' => '26000',
            'div_name' => 'Divisi Production Management Office',
            'username'=>'promo',
            'id_direktorat' => '20000',
        ],
        [
            'id_divisi' => '31000',
            'div_name' => 'Divisi Pemasaran dan Penjualan Kapal',
            'username'=>'penjualankapal',
            'id_direktorat' => '30000',
        ],
        [
            'id_divisi' => '33000',
            'div_name' => 'Divisi Supply Chain',
            'username'=>'sc',
            'id_direktorat' => '30000',
        ],
        [
            'id_divisi' => '34000',
            'div_name' => 'Divisi Kawasan dan K3LH',
            'username'=>'kamK3LH',
            'id_direktorat' => '30000',
        ],
        [
            'id_divisi' => '41000',
            'div_name' => 'Divisi Perencanaan Strategis Perusahaan',
            'username'=>'psp',
            'id_direktorat' => '40000',
        ],
        [
            'id_divisi' => '42000',
            'div_name' => 'Divisi Perbendaharaan',
            'username'=>'bendahara',
            'id_direktorat' => '40000',
        ],
        [
            'id_divisi' => '43000',
            'div_name' => 'Divisi Akuntansi',
            'username'=>'akuntansi',
            'id_direktorat' => '40000',
        ],
        [
            'id_divisi' => '44000',
            'div_name' => 'Divisi Human Capital Management',
            'username'=>'hcm',
            'id_direktorat' => '40000',
        ],
        [
            'id_divisi' => '45000',
            'div_name' => 'Divisi Management Risiko',
            'username'=>'maris',
            'id_direktorat' => '40000',
        ],
        [
            'id_divisi' => '51000',
            'div_name' => 'Divisi Office The Board',
            'username'=>'otb',
            'id_direktorat' => '50000',
        ],
        [
            'id_divisi' => '52000',
            'div_name' => 'Divisi Legal',
            'username'=>'legal',
            'id_direktorat' => '50000',
        ],
        [
            'id_divisi' => '61000',
            'div_name' => 'Divisi Teknologi & Quality Assurance',
            'username'=>'quality',
            'id_direktorat' => '60000',
        ],
    ];
    Divisi::insert($divisi);
    }
}