<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaseCMS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('basecms')->insert(
            [
                'id' => '1',
                'favicon' => 'default.ico',
                'app_name' => 'Kuli',
                'call_us' => '62812101920',
                'email' => 'contoh@mail.com',
                'location' => '1-1 Osakajo, Chuo Ward, Osaka, 540-0002, Jepang',
                'fb_link' => 'https://www.facebook.com/robby.tanizar',
                'ig_link' => 'https://instagram.com/al_nv23',
                'quote' => 'The only way to do great work is to love what you do.',
                'quote_author' => 'Steve Jobs'
            ]
        );
    }
}
