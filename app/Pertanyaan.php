<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaans';

    protected $fillable = [
        'id_user','judul', 'isi', 'tag', 'id_jawabanTepat','poin_vote'
    ];
    /*
    stuck bingung join pake eloquent...
    public function jawaban(){
        return $this->hasMany('App\Jawaban', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }*/

    // public function user(){
    //     return $this->belongsTo('App/User','id_user', 'id');
    // }

    // public function jawaban(){
    //     return $this->hasMany('App/Jawaban');
    // }

    // public function komentar(){
    //     return $this->hasMany('App/Komentar');
    // }

    public function user(){
        return $this->belongsTo('App/User');
    }

    public function jawaban(){
        return $this->hasMany('App/Jawaban');
    }

    public function komentar(){
        return $this->hasMany('App/Komentar');
    }
}
