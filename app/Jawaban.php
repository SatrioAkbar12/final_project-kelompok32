<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawabans';

    protected $fillable = [
        'id_user', 'id_pertanyaan', 'isi', 'poin_vote'
    ];
}
