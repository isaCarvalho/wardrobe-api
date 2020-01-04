<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roupa extends Model
{
    protected $table = "roupas";

    public $timestamps = false;

    protected $fillable = [
        'categoria', 'descricao', 'tamanho', 'ativo', 'id_user'
    ];

    protected $hidden = [

    ];
}