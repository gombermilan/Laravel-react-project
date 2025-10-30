<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Megrendeles extends Model
{
    protected $table = 'megrendelesek';

    protected $fillable = [
        'ugyfel_id',
        'rendeles_datum',
        'teljesites_datum',
        'allapot'
    ];
}
