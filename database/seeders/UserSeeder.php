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
                'name' => 'Sekper',
                'id_divisi' => '11000',
                'username' => 'Sekretaris Perusahaan',
                'email' => 'sekper@gmail.com',
                'password' => Hash::make('sekper123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 3,
                'name' => 'SatPInt',
                'id_divisi' => '12000',
                'username' => 'Satuan Pengawasan Intern',
                'email' => 'satpint@gmail.com',
                'password' => Hash::make('satpint123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 4,
                'name' => 'DivTi',
                'id_divisi' => '13000',
                'username' => 'Divisi Teknologi Informasi',
                'email' => 'divti@gmail.com',
                'password' => Hash::make('divti123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 5,
                'name' => 'Desain',
                'id_divisi' => '14000',
                'username' => 'Divisi Desain',
                'email' => 'desain@gmail.com',
                'password' => Hash::make('desain123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 6,
                'name' => 'Rekum',
                'id_divisi' => '21000',
                'username' => 'Divisi Rekayasa Umum',
                'email' => 'rekum@gmail.com',
                'password' => Hash::make('rekum123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 7,
                'name' => 'Kaprang',
                'id_divisi' => '23000',
                'username' => 'Divisi Kapal Perang',
                'email' => 'kaprang@gmail.com',
                'password' => Hash::make('kaprang123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 8,
                'name' => 'Kasel',
                'id_divisi' => '24000',
                'username' => 'Divisi Kapal Selam',
                'email' => 'kasel@gmail.com',
                'password' => Hash::make('kasel123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 9,
                'name' => 'Harkan',
                'id_divisi' => '25000',
                'username' => 'Divisi Pemeliharaan dan Perbaikan',
                'email' => 'harkan@gmail.com',
                'password' => Hash::make('harkan123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 10,
                'name' => 'DivPromo',
                'id_divisi' => '26000',
                'username' => 'Divisi Production Management Office',
                'email' => 'divpromo@gmail.com',
                'password' => Hash::make('divpromo123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 11,
                'name' => 'Penjualan kapal',
                'id_divisi' => '31000',
                'username' => 'Divisi Pemasaran dan Penjualan Kapal',
                'email' => 'kapal@gmail.com',
                'password' => Hash::make('kapal123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 12,
                'name' => 'Supply Chain',
                'id_divisi' => '33000',
                'username' => 'Divisi Supply Chain',
                'email' => 'suppchain@gmail.com',
                'password' => Hash::make('suppchain123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 13,
                'name' => 'kamK3LH',
                'id_divisi' => '34000',
                'username' => 'Divisi Kawasan dan K3LH',
                'email' => 'kamk3lh@gmail.com',
                'password' => Hash::make('kamk3lh123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 14,
                'name' => 'PSP',
                'id_divisi' => '41000',
                'username' => 'Divisi Perencanaan Strategis Perusahaan',
                'email' => 'psp@gmail.com',
                'password' => Hash::make('psp123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 15,
                'name' => 'Bendahara',
                'id_divisi' => '42000',
                'username' => 'Divisi Perbendaharaan',
                'email' => 'bendahara@gmail.com',
                'password' => Hash::make('bendahara123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 16,
                'name' => 'Akuntansi',
                'id_divisi' => '43000',
                'username' => 'Divisi Akuntansi',
                'email' => 'akuntansi@gmail.com',
                'password' => Hash::make('akuntansi123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 17,
                'name' => 'HCM',
                'id_divisi' => '44000',
                'username' => 'Divisi Human Capital Management',
                'email' => 'hcm@gmail.com',
                'password' => Hash::make('hcm123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 18,
                'name' => 'Maris',
                'id_divisi' => '45000',
                'username' => 'Divisi Management Risiko',
                'email' => 'maris@gmail.com',
                'password' => Hash::make('maris123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 19,
                'name' => 'OTB',
                'id_divisi' => '51000',
                'username' => 'Divisi Office The Board',
                'email' => 'otb@gmail.com',
                'password' => Hash::make('otb123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 20,
                'name' => 'Legal',
                'id_divisi' => '52000',
                'username' => 'Divisi Legal',
                'email' => 'legal@gmail.com',
                'password' => Hash::make('legal123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 21,
                'name' => 'Quality',
                'id_divisi' => '61000',
                'username' => 'Divisi Teknologi & Quality Assurance',
                'email' => 'quality@gmail.com',
                'password' => Hash::make('quality123'),
                'status' => 'pic',
                
                
            ],
            [
                'id' => 22,
                'name' => 'Penjualan rekumhar',
                'id_divisi' => '32000',
                'username' => 'Divisi Penjualan Rekumhar',
                'email' => 'rekumhar@gmail.com',
                'password' => Hash::make('rekumhar123'),
                'status' => 'pic',
                
            ],
            [
                'id' => 23,
                'name' => 'Kania',
                'id_divisi' => '22000',
                'username' => 'Divisi Kapal Niaga',
                'email' => 'kania@gmail.com',
                'password' => Hash::make('kania123'),
                'status' => 'pic',
                
            ],
           
        ];
        User::insert($users);
    }
}