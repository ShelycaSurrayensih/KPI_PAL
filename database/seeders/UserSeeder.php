<?php

namespace Database\Seeders;
use Hash;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'id' => 1,
                'name' => 'admin',
                'id_divisi' => '0',
                'username' => 'administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'status' => 'administrator',
                
                
            ],
            [
                'id' => 2,
                'name' => 'user',
                'id_divisi' => '21000',
                'username' => 'user pic',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'),
                'status' => 'pic',
                
                
            ],
        ];
        User::insert($users);
    }
}