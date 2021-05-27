<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    use HasFactory;

    public function updBaseCMS($data)
    {
        DB::table('basecms')->update($data);
    }

    public function updAboutPage($data)
    {
        DB::table('apage')->update($data);
    }

    public function SaveService($data)
    {
        DB::table('spage')->insert($data);
    }

    public function DetService($id)
    {
        return DB::table('spage')->where('id', '=', $id)->first();
    }

    public function updService($data, $id)
    {
        DB::table('spage')->where('id', '=', $id)->update($data);
    }

    public function delService($id)
    {
        DB::table('spage')->where('id', '=', $id)->delete();
    }
}
