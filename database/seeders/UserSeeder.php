<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'Albet Novendo',
                'pro_pic' => 'propic1.jpg',
                'work_rank' => 'Founder & CEO',
                'level' => 'admin',
                'username' => 'albet',
                'ig_link' => 'https://instagram.com/al_nv23',
                'fb_link' => '',
                'email' => 'albet@admin.com',
                'password' => bcrypt('albet123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'name' => 'Robby Tanizar',
                'pro_pic' => 'propic2.jpg',
                'work_rank' => 'CO-Founder',
                'level' => 'admin',
                'username' => 'robby',
                'ig_link' => 'https://instagram.com/robbytanizar/',
                'fb_link' => 'https://www.facebook.com/robby.tanizar',
                'email' => 'robby@admin.com',
                'password' => bcrypt('robby123'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
