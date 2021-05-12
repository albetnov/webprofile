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
            'about_title' => 'Apa itu Kuli?',
            'about_p1' => 'Kuli merupakan sebuah jasa pembangunan yang sudah dipercaya lebih dari
            10 Tahun. Bersama dengan para pembangun yang sudah bersertifikat dan profesional. Bukan,
            tidak mungkin bagi kami untuk merealisasikan mimpi anda.',
            'about_p2' => 'Kenapa harus kami? Karena kami dapat merealisasikan tempat ataupun bangunan
            idaman anda semirip dan sebagus mungkin lebih dari siapapun. Ya, saya tidak berbohong. Ayolah
            ini cuman sample. Saya sedang berbasa-basi ini. Ayo dong jadilah 1 kalimat... Oke sudah jadi :v'
        ]);
    }
}
