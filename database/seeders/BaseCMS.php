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
                'app_name' => 'Dev.net',
                'call_us' => '62812101920',
                'email' => 'dev@soft.net',
                'location' => 'Batam Center, Batam, Kepuluan Riau, Indonesia.',
                'fb_link' => 'https://www.facebook.com/robby.tanizar',
                'ig_link' => 'https://instagram.com/al_nv23',
                'quote' => 'The only way to do great work is to love what you do.',
                'quote_author' => 'Steve Jobs'
            ]
        );
    }
}
