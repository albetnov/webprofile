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

    public function about()
    {
        return DB::table('apage')->first();
    }

    public function service()
    {
        return DB::table('spage')->get();
    }

    public function iservice()
    {
        return DB::table('spage')->limit(3)->get();
    }

}
