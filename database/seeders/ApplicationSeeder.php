<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apps = [
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi1',
                'User_Guide' => 'http://link-user-guide1.com',
                'Technical_Document' => 'http://link-technical-document1.com',
                'Category' => 'Non ERP',
                'Login' => 'Konsumen',
                'Device' => 'Mobile',
                'Description' => 'Deskripsi aplikasi 1',
                'Platform' => 'Bahasa_Pemrograman1',
                'DB_Prod' => 'db_prod1.domain.com',
                'DB_Dev' => 'db_dev1.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi1',
                'Password_Aplikasi' => 'Nama_Aplikasi1',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman1',
                'Notes_Aplikasi' => 'Catatan aplikasi 1'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi2',
                'User_Guide' => 'http://link-user-guide2.com',
                'Technical_Document' => 'http://link-technical-document2.com',
                'Category' => 'Inbound',
                'Login' => 'Non Konsumen',
                'Device' => 'Web',
                'Description' => 'Deskripsi aplikasi 2',
                'Platform' => 'Bahasa_Pemrograman2',
                'DB_Prod' => 'db_prod2.domain.com',
                'DB_Dev' => 'db_dev2.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi2',
                'Password_Aplikasi' => 'Nama_Aplikasi2',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman2',
                'Notes_Aplikasi' => 'Catatan aplikasi 2'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi3',
                'User_Guide' => 'http://link-user-guide3.com',
                'Technical_Document' => 'http://link-technical-document3.com',
                'Category' => 'Outbound',
                'Login' => 'Konsumen',
                'Device' => 'Desktop',
                'Description' => 'Deskripsi aplikasi 3',
                'Platform' => 'Bahasa_Pemrograman3',
                'DB_Prod' => 'db_prod3.domain.com',
                'DB_Dev' => 'db_dev3.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi3',
                'Password_Aplikasi' => 'Nama_Aplikasi3',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman3',
                'Notes_Aplikasi' => 'Catatan aplikasi 3'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi4',
                'User_Guide' => 'http://link-user-guide4.com',
                'Technical_Document' => 'http://link-technical-document4.com',
                'Category' => 'Non ERP',
                'Login' => 'Konsumen',
                'Device' => 'Mobile',
                'Description' => 'Deskripsi aplikasi 4',
                'Platform' => 'Bahasa_Pemrograman4',
                'DB_Prod' => 'db_prod4.domain.com',
                'DB_Dev' => 'db_dev4.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi4',
                'Password_Aplikasi' => 'Nama_Aplikasi4',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman4',
                'Notes_Aplikasi' => 'Catatan aplikasi 4'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi5',
                'User_Guide' => 'http://link-user-guide5.com',
                'Technical_Document' => 'http://link-technical-document5.com',
                'Category' => 'Inbound',
                'Login' => 'Non Konsumen',
                'Device' => 'Web',
                'Description' => 'Deskripsi aplikasi 5',
                'Platform' => 'Bahasa_Pemrograman5',
                'DB_Prod' => 'db_prod5.domain.com',
                'DB_Dev' => 'db_dev5.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi5',
                'Password_Aplikasi' => 'Nama_Aplikasi5',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman5',
                'Notes_Aplikasi' => 'Catatan aplikasi 5'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi6',
                'User_Guide' => 'http://link-user-guide6.com',
                'Technical_Document' => 'http://link-technical-document6.com',
                'Category' => 'Outbound',
                'Login' => 'Konsumen',
                'Device' => 'Desktop',
                'Description' => 'Deskripsi aplikasi 6',
                'Platform' => 'Bahasa_Pemrograman6',
                'DB_Prod' => 'db_prod6.domain.com',
                'DB_Dev' => 'db_dev6.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi6',
                'Password_Aplikasi' => 'Nama_Aplikasi6',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman6',
                'Notes_Aplikasi' => 'Catatan aplikasi 6'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi7',
                'User_Guide' => 'http://link-user-guide7.com',
                'Technical_Document' => 'http://link-technical-document7.com',
                'Category' => 'Non ERP',
                'Login' => 'Konsumen',
                'Device' => 'Mobile',
                'Description' => 'Deskripsi aplikasi 7',
                'Platform' => 'Bahasa_Pemrograman7',
                'DB_Prod' => 'db_prod7.domain.com',
                'DB_Dev' => 'db_dev7.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi7',
                'Password_Aplikasi' => 'Nama_Aplikasi7',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman7',
                'Notes_Aplikasi' => 'Catatan aplikasi 7'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi8',
                'User_Guide' => 'http://link-user-guide8.com',
                'Technical_Document' => 'http://link-technical-document8.com',
                'Category' => 'Inbound',
                'Login' => 'Non Konsumen',
                'Device' => 'Web',
                'Description' => 'Deskripsi aplikasi 8',
                'Platform' => 'Bahasa_Pemrograman8',
                'DB_Prod' => 'db_prod8.domain.com',
                'DB_Dev' => 'db_dev8.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi8',
                'Password_Aplikasi' => 'Nama_Aplikasi8',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman8',
                'Notes_Aplikasi' => 'Catatan aplikasi 8'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi9',
                'User_Guide' => 'http://link-user-guide9.com',
                'Technical_Document' => 'http://link-technical-document9.com',
                'Category' => 'Outbound',
                'Login' => 'Konsumen',
                'Device' => 'Desktop',
                'Description' => 'Deskripsi aplikasi 9',
                'Platform' => 'Bahasa_Pemrograman9',
                'DB_Prod' => 'db_prod9.domain.com',
                'DB_Dev' => 'db_dev9.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi9',
                'Password_Aplikasi' => 'Nama_Aplikasi9',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman9',
                'Notes_Aplikasi' => 'Catatan aplikasi 9'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi10',
                'User_Guide' => 'http://link-user-guide10.com',
                'Technical_Document' => 'http://link-technical-document10.com',
                'Category' => 'Non ERP',
                'Login' => 'Konsumen',
                'Device' => 'Mobile',
                'Description' => 'Deskripsi aplikasi 10',
                'Platform' => 'Bahasa_Pemrograman10',
                'DB_Prod' => 'db_prod10.domain.com',
                'DB_Dev' => 'db_dev10.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi10',
                'Password_Aplikasi' => 'Nama_Aplikasi10',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman10',
                'Notes_Aplikasi' => 'Catatan aplikasi 10'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi11',
                'User_Guide' => 'http://link-user-guide11.com',
                'Technical_Document' => 'http://link-technical-document11.com',
                'Category' => 'Inbound',
                'Login' => 'Non Konsumen',
                'Device' => 'Web',
                'Description' => 'Deskripsi aplikasi 11',
                'Platform' => 'Bahasa_Pemrograman11',
                'DB_Prod' => 'db_prod11.domain.com',
                'DB_Dev' => 'db_dev11.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi11',
                'Password_Aplikasi' => 'Nama_Aplikasi11',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman11',
                'Notes_Aplikasi' => 'Catatan aplikasi 11'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi12',
                'User_Guide' => 'http://link-user-guide12.com',
                'Technical_Document' => 'http://link-technical-document12.com',
                'Category' => 'Outbound',
                'Login' => 'Konsumen',
                'Device' => 'Desktop',
                'Description' => 'Deskripsi aplikasi 12',
                'Platform' => 'Bahasa_Pemrograman12',
                'DB_Prod' => 'db_prod12.domain.com',
                'DB_Dev' => 'db_dev12.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi12',
                'Password_Aplikasi' => 'Nama_Aplikasi12',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman12',
                'Notes_Aplikasi' => 'Catatan aplikasi 12'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi13',
                'User_Guide' => 'http://link-user-guide13.com',
                'Technical_Document' => 'http://link-technical-document13.com',
                'Category' => 'Non ERP',
                'Login' => 'Konsumen',
                'Device' => 'Mobile',
                'Description' => 'Deskripsi aplikasi 13',
                'Platform' => 'Bahasa_Pemrograman13',
                'DB_Prod' => 'db_prod13.domain.com',
                'DB_Dev' => 'db_dev13.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi13',
                'Password_Aplikasi' => 'Nama_Aplikasi13',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman13',
                'Notes_Aplikasi' => 'Catatan aplikasi 13'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi14',
                'User_Guide' => 'http://link-user-guide14.com',
                'Technical_Document' => 'http://link-technical-document14.com',
                'Category' => 'Inbound',
                'Login' => 'Non Konsumen',
                'Device' => 'Web',
                'Description' => 'Deskripsi aplikasi 14',
                'Platform' => 'Bahasa_Pemrograman14',
                'DB_Prod' => 'db_prod14.domain.com',
                'DB_Dev' => 'db_dev14.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi14',
                'Password_Aplikasi' => 'Nama_Aplikasi14',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman14',
                'Notes_Aplikasi' => 'Catatan aplikasi 14'
            ],
            [
                'Nama_Aplikasi' => 'Nama_Aplikasi15',
                'User_Guide' => 'http://link-user-guide15.com',
                'Technical_Document' => 'http://link-technical-document15.com',
                'Category' => 'Outbound',
                'Login' => 'Konsumen',
                'Device' => 'Desktop',
                'Description' => 'Deskripsi aplikasi 15',
                'Platform' => 'Bahasa_Pemrograman15',
                'DB_Prod' => 'db_prod15.domain.com',
                'DB_Dev' => 'db_dev15.domain.com',
                'Server_Dev' => "null",
                'Username_Aplikasi' => 'Nama_Aplikasi15',
                'Password_Aplikasi' => 'Nama_Aplikasi15',
                'Enviroment_Aplikasi' => 'Bahasa_Pemrograman15',
                'Notes_Aplikasi' => 'Catatan aplikasi 15'
            ]
        ];

        foreach($apps as $app){
            Application::insert($app);
        }

    }
}
