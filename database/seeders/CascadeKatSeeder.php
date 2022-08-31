<?php

namespace Database\Seeders;

use App\Models\CascadeKat;
use Illuminate\Database\Seeder;

class CascadeKatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cascade=[
            [
                'id_kat' => '1',
                'desc_kat' => 'Korporasi',
            ],
            [
                'id_kat' => '2',
                'desc_kat' => 'Transformasi',
            ],
            [
                'id_kat' => '3',
                'desc_kat' => 'PMN',
            ],
        ];
        CascadeKat::insert($cascade);
    }
}
