<?php

namespace Database\Seeders;
use App\Models\IndivKpiDir;
use Illuminate\Database\Seeder;

class IndivKpiDirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indiv_kpidir=[
            [
                'id_kpidir' => 1,
                'id_direktorat' => 40000,
                'id_divisi' => 45000,
                'desc_kpidir' => 'Dashboard RTM',
                'satuan' => '%',
                'target' => '100%',
                'bobot' => '25',
                'ket' => 'Pengukuran dan pengendalian risiko berbasis aplikasi',
                'asal_kpi' => 'TRANSFORMASI + MENDUKUNG KORPORASI',
                'alasan' => 'Mendukung kolaborasi indhan terhadap aplikasi RTM',
            ],
            [
                'id_kpidir' => 2,
                'id_direktorat' => 40000,
                'id_divisi' => 43000,
                'desc_kpidir' => 'Standar tarif jual JO',
                'satuan' => '%',
                'target' => '100%',
                'bobot' => '25',
                'ket' => ' Melakukan perhitungan dan pengajuan standar tarif jual ',
                'asal_kpi' => 'TRANSFORMASI',
                'alasan' => 'Mendukung operasional dan efisiensi JO',
            ],
            [
                'id_kpidir' => 3,
                'id_direktorat' => 30000,
                'id_divisi' => 34000,
                'desc_kpidir' => 'TKDN fasilitas kapal selam',
                'satuan' => '%',
                'target' => '36,67%',
                'bobot' => '25',
                'ket' => ' Mendukung pemenuhan TKDN Kapal Selam',
                'asal_kpi' => 'PMN',
                'alasan' => 'Mendukung ketercapian KPI PMN',
            ],
        ];
        IndivKpiDir::insert($indiv_kpidir);
    }
}