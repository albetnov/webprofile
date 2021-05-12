<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class spage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spage')->insert([
            [
                'id' => '1',
                'service_img' => 'service1.jpg',
                'service_title' => 'Konsturksi Bangunan',
                'service_desc' => 'Kami sudah jamin bahwa kami handal terlebih dalam konstruksi sebuah bangunan. Percayalah!'
            ],
            [
                'id' => '2',
                'service_img' => 'service2.jpg',
                'service_title' => 'Renovasi Rumah',
                'service_desc' => 'Apakah anda pernah membanyangkan rumah anda yang bagus dalam sekejap? Kalau tidak. Coba sini!'
            ],
            [
                'id' => '3',
                'service_img' => 'service3.jpg',
                'service_title' => 'Desain Bangunan',
                'service_desc' => 'Tidak pandai desain? Kami pandai! Cukup serahkan pada yang profesional seperti kami. Anda bayar saja.'
            ]

        ]);
    }
}
