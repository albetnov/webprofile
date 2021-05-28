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
                'service_title' => 'Desain',
                'service_desc' => 'Kami sudah jamin bahwa kami handal terlebih dalam desain program. Percayalah!'
            ],
            [
                'id' => '2',
                'service_img' => 'service2.jpg',
                'service_title' => 'Nyari bug',
                'service_desc' => 'Apakah anda pernah membanyangkan bug dimana? dan bingung cara mengatasinya? kalau iya serahkan saja ke kami.'
            ],
            [
                'id' => '3',
                'service_img' => 'service3.jpg',
                'service_title' => 'Hosting',
                'service_desc' => 'Kami sediakan hosting asalkan Anda bayar saja.'
            ]

        ]);
    }
}
