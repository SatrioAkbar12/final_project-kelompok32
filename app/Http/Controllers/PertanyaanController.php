<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Jawaban;

use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    public function create(){
        return view('pertanyaan.form_pertanyaan');
    }

    public function store(Request $request){
        Pertanyaan::create([
            'id_user' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'poin_vote' => 0
        ]);

        return redirect('/home');
    }


    public function show($id){
        $pertanyaan = Pertanyaan::find($id);
        $jawaban = Jawaban::all();

        return view('pertanyaan.show_pertanyaan', ['pertanyaan'=>$pertanyaan], ['jawaban' => $jawaban]);
    }

    public function edit($id){

    }
}
