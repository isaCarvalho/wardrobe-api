<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clothe extends Model
{
    protected $table = "clothes";

    public $timestamps = false;

    protected $fillable = [
        'description', 'status', 'id_category', 'id_size', 'id_user'
    ];

    protected $hidden = [

    ];
}