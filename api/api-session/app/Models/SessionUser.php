<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionUser extends Model
{
    use HasFactory;
    protected $table = "user_session";

    protected $fillable = [
        'token',
        'refresh_token',
        'token_expried',
        'refesh_token_expried',
        'user_id'
    ];
}
