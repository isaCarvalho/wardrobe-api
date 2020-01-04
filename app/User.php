<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";

    public $timestamps = false;

    protected $fillable = [
        'nome', 'email', 'senha', 'ativo',
    ];

    protected $hidden = [
        'senha',
    ];
}
