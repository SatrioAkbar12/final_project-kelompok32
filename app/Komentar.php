<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';

    protected $fillable = [
        'id_user', 'id_asal', 'isi'
    ];
}
