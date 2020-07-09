<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
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
}
