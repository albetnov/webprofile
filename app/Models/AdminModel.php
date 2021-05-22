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

    public function updiPage($data)
    {
        DB::table('ipage')->update($data);
    }
}
