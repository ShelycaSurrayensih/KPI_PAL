<?php

namespace Database\Seeders;
use App\Models\IndivPlan;
use Illuminate\Database\Seeder;

class IndivPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indiv_plan=[
            [
                'id_plan' => 1,
                'tw' => 'Proses Aanwijzing oleh Dep Pengadaan BJ',
                'id_divisi' => '45000',
                'prognosa' => 'Peningkatan Aplikasi Manajemen Risiko  Korporasi (Web Manrisk & IFS)',                
            ],
            [
                'id_plan' => 2,
                'tw' => 'Koordinasi internal penyusunan format',
                'id_divisi' => '43000',
                'prognosa' => 'Penyelesaian format',                
            ],
            [
                'id_plan' => 3,
                'tw' => 'Realisasi kontrak dengan vendor dalam negeri s/d April 2022 sebesar 1,97% ekuivalen nilai serapan PO.',
                'id_divisi' => '34000',
                'prognosa' => 'Realisasi kontrak dengan vendor dalam negeri s/d Maret 2022 sebesar 1,78% ekuivalen nilai serapan PO.',                
            ],
        ];
        IndivPlan::insert($indiv_plan);
    }
}