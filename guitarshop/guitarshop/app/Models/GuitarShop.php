<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuitarShop extends Model
{
    protected $table = 'szolgaltatasok';

    protected $fillable = [
        'nev',
        'leiras',
        'ar',
    ];
}
