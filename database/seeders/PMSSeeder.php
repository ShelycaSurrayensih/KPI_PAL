<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InisiatifStrategis;
use App\Models\KategoriPms;
use App\Models\KpiPms;


class PMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $inis_strat=[
            [
                //'id_inisitif' => 1,
                'inisiatif_desc' => 'Ekspansi EBITDA',
                'tahun_inisiatif' => 2021,
            ],
            [
                //'id_inisitif' => 2,
                'inisiatif_desc' => 'Menciptakan economic value creation dengan realisasi ROIC sama dengan atau diatas WACC',
                'tahun_inisiatif' => 2021,
            ],
            [
                //'id_inisitif' => 3,
                'inisiatif_desc' => 'Menjaga kondisi keuangan BUMN dengan mempertahankan rasio-rasio gearing setara dengan investment grade company',
                'tahun_inisiatif' => 2021,
            ],
        ];

        $kat_strat=[
            [
                //'id_kat' => '1',
                'kat_desc' => 'Nilai Ekonomi dan Sosial untuk Indonesia',
                'ket' => 'A'
            ],
            [
                //'id_kat' => '2',
                'kat_desc' => 'Inovasi Model Bisnis',
                'ket' => 'B'
            ],
            [
                //'id_kat' => '3',
                'kat_desc' => 'Kepemimpinan Teknologi',
                'ket' => 'C'
            ],
        ];
        $kpi_pms=[
            [
                //'id_kpipms' => 1,
                'id_kat' => 1,
                'id_inisiatif' => 1,
                'sub_kat' => 'A.1 Finansial',
                'kpi_desc' => 'EBITDA tahun berjalan',
                'polaritas' => 'Maximize',
                'bobot' => 8,
                'target' => '339.04',
                'div_lead' => 42000,
                'tahun_kpipms' => 2022,
            ],
            [
                //'id_kpipms' => 2,
                'id_kat' => 1,
                'id_inisiatif' => 2,
                'sub_kat' => 'A.1 Finansial',
                'kpi_desc' => 'ROIC dengan tingkat jangka panjang',
                'polaritas' => 'Maximize',
                'bobot' => 6,
                'target' => '1.4',
                'div_lead' => 42000,
                'tahun_kpipms' => 2022,
            ],
            [
                //'id_kpipms' => 3,
                'id_kat' => 1,
                'id_inisiatif' => 3,
                'sub_kat' => 'A.1 Finansial',
                'kpi_desc' => 'Interest bearing Debt to EBITDA',
                'polaritas' => 'Minimize',
                'bobot' => 4,
                'target' => '9.89',
                'div_lead' => 42000,
                'tahun_kpipms' => 2022,
            ],
        ];

        InisiatifStrategis::insert($inis_strat);
        KategoriPms::insert($kat_strat);
        KpiPms::insert($kpi_pms);
    }
}
