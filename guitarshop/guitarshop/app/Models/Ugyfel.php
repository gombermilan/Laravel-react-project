<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ugyfel extends Model
{
    protected $table = 'ugyfelek';

    protected $fillable = [
        'id',
        'nev',
        'email',
        'telefon',
        'cim'
    ];
}
