<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{
    public function store(Request $request){
        Jawaban::create([
            'id_user' => Auth::id(),
            'id_pertanyaan' => $request->id,
            'isi' => $request->isi,
            'poin_vote' => 0
        ]);

        return redirect('/home');
    }
    public function showAll(){
        $jawaban = Jawaban::all();
        dd($jawaban);

        compact('jawaban');
        return view('pertanyaan.show_pertanyaan', ['jawaban'=>$jawaban]);
    }
}
