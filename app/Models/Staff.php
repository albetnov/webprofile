<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'stfinfo';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'info_img', 'info_title', 'info_desc'
    ];
}
