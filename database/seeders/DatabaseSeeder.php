<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'arh',
                'password' => bcrypt('arh123'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Abu Rizal Hakim',
                'Email' => 'arh@gmail.com',
                'Role' => 'Teknisi',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'kba',
                'password' => bcrypt('kba'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Khawari Bagus Abdullah',
                'Email' => 'kba@gmail.com',
                'Role' => 'Admin',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'sap',
                'password' => bcrypt('sap123'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Setyo Awan Prakoso',
                'Email' => 'sap@gmail.com',
                'Role' => 'Teknisi',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'mip',
                'password' => bcrypt('mip123'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Moh. Iwan Purwanto',
                'Email' => 'mip@gmail.com',
                'Role' => 'Teknisi',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'ma',
                'password' => bcrypt('ma123'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Mardiana Azizah',
                'Email' => 'ma@gmail.com',
                'Role' => 'Teknisi',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'trj',
                'password' => bcrypt('trj123'),
                'Nomor_HP' => '0812345',
                'Nama_User' => 'Tithe Ricky Joharsyah',
                'Email' => 'trj@gmail.com',
                'Role' => 'Teknisi',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Admin 1',
                'Email' => 'admin@gmail.com',
                'Role' => 'Admin',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'reporter',
                'password' => bcrypt('reporter123'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Reporter 1',
                'Email' => 'reporter@gmail.com',
                'Role' => 'Reporter',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'konsumen',
                'password' => bcrypt('konsumen123'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Konsumen 1',
                'Email' => 'konsumen@gmail.com',
                'Role' => 'Konsumen',
                'Status_Keaktifan'=> true, 
            ],
            [
                'username' => 'teknisi',
                'password' => bcrypt('teknisi'),
                'Nomor_HP' => '08123456789',
                'Nama_User' => 'Teknisi 1',
                'Email' => 'teknisi@gmail.com',
                'Role' => 'Teknisi',
                'Status_Keaktifan'=> true, 
            ]
        ];

        foreach($users as $user){
            User::insert($user);
        }



        $this->call(ApplicationSeeder::class);
    }
}
