<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $table = 'ipage';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'title', 'img_c1', 'img_c2', 'img_c3', 'title_c1', 'title_c2', 'title_c3', 'desc_c1', 'desc_c2',
        'desc_c3', 'img_welcome', 'title_welcome', 'desc_welcome', 'yt_id'
    ];
}
