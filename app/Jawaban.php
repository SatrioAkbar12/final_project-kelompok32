<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawabans';

    protected $fillable = [
        'id_user', 'id_pertanyaan', 'isi', 'poin_vote'
    ];

    // public function user(){
    //     return $this->belongsTo('App/User');
    // }

    // public function pertanyaan(){
    //     return $this->belongsTo('App/Pertanyaan');
    // }

    // public function komentar(){
    //     return $this->hasMany('App/Komentar');
    // }

    public function user(){
        return $this->belongsTo('User');
    }

    public function pertanyaan(){
        return $this->belongsTo('Pertanyaan');
    }

    public function komentar(){
        return $this->hasMany('Komentar');
    }
}
