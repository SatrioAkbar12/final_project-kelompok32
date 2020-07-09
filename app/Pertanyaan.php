<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaans';

    protected $fillable = [
        'id_user','judul', 'isi', 'id_jawabanTepat','poin_vote'
    ];
}
