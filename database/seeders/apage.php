<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class apage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apage')->insert([
            'id' => '1',
            'about_img' => 'ab_img.jpg',
            'work_exp' => '10',
            'about_title' => 'Apa itu Dev.net?',
            'about_p1' => 'Dev.net merupakan perusahaan Software House Nomor 1. Iya nomor 1. Di Dev.net
            Hampi semua pasti jadi. Selain, membuat software kami juga membuka training. Jadi datanglah!',
            'about_p2' => 'di Dev.net Software impian anda pasti jadi. Hah Ayo dong
            Basa basi oh basa basi. 1.2.3 teks. panjang. ayok raih. panjang.
            huahuhauhau. Ya, saya tidak berbohong. Ayolah
            ini cuman sample. Saya sedang berbasa-basi ini. Ayo dong jadilah 1 kalimat... Oke sudah jadi :v'
        ]);
    }
}
