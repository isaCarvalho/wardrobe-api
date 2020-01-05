<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = "sizes";

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [

    ];
}