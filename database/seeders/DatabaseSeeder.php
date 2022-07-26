<?php

namespace Database\Seeders;

use App\Models\CascadeKat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DirektoratSeeder::class,
            DivisiSeeder::class,
            UserSeeder::class,
            CascadeKatSeeder::class,
            // PMSSeeder::class,
        ]);
    }
}