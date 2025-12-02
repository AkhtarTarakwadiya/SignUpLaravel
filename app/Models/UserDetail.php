<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
       protected $table = 'users_details';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];
}
