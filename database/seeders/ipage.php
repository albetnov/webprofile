<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ipage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ipage')->insert([
            'id' => '1',
            'title' => 'Welcome to Dev.net',
            'img_c1' => 'carousel1.png',
            'img_c2' => 'carousel2.jpg',
            'img_c3' => 'carousel3.jpg',
            'title_c1' => 'Kami adalah',
            'title_c2' => 'Bersama dengan kami',
            'title_c3' => 'Asalkan kami',
            'desc_c1' => 'Software Developer',
            'desc_c2' => 'Semua pasti jadi!',
            'desc_c3' => 'Di bayar dong :V.',
            'img_welcome' => 'welcome_default.jpg',
            'title_welcome' => '30 Tahun pengalaman',
            'desc_welcome' => 'Dengan 30 Tahun Pengalaman dari kami apa yang ingin anda bangun
            pastilah jadi. Ya karena kami memiliki pengalaman lebih dari 20 Tahun yaitu
            30 Tahun. Ayolah ini teks cuma untuk contoh doang. Jadi saya harus buat cukup panjang,
            semoga ini udah cukup panjang. Ayok panjang yok bisa yok. Yok panjang... Susah juga
            buat teks basa basi yang panjang. Okelah, ini udah cukup panjang...',
            'yt_id' => 'WoqvJWNaUqI'
        ]);
    }
}
