<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Developer extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'deleted_at'
    ];

    protected $fillable = [
        'nome',
        'sexo',
        'hobby',
        'idade',
        'dataNascimento'
    ];
}
