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
            'title' => 'Welcome to Kuli',
            'img_c1' => 'carousel1.jpg',
            'img_c2' => 'carousel2.jpg',
            'img_c3' => 'carousel3.jpg',
            'title_c1' => 'Kami adalah',
            'title_c2' => 'Bersama dengan kami',
            'title_c3'=> 'Asalkan kami',
            'desc_c1' => 'Kuli Bangunan',
            'desc_c2' => 'Semua pasti jadi!',
            'desc_c3' => 'Di bayar dong :V.',
            'img_welcome' => 'welcome_default.jpg',
            'title_welcome' => '30 Tahun pengalaman',
            'desc_welcome' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. 
            Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, 
            viverra quis sem.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur 
            facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, 
            viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. 
            Aliquam interdum at lacus non blandit.',
            'video_background' => 'vid_bg.jpg',
            'yt_id' => 'qiV2quOhjxA'
        ]);
    }
}
