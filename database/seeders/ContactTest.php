<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserContact;

class ContactTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserContact::factory(1000)->create();
    }
}
