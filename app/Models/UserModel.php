<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    use HasFactory;

    public function basecms()
    {
        return DB::table('basecms')->first();
    }

    public function index()
    {
        return DB::table('ipage')->first();
    }

}
