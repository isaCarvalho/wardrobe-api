<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password', 'status',
    ];

    protected $hidden = [
        'password',
    ];
}
