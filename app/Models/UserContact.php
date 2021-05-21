<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $primaryKey = 'id';
    public $timestamps = true;
    const CREATED_AT = 'posted_at';
    const UPDATED_AT = null;
    protected $fillable = ['name_contact', 'email_contact', 'subject_contact', 'message_contact'];
}
