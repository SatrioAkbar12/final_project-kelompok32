<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;
use App\Jawaban;
use App\User;

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
            'tag' => $request->tag,
            'poin_vote' => 0
        ]);

        return redirect('/home');
    }


    public function show($id){
        $pertanyaan = Pertanyaan::find($id);
        $tag = explode(',',$pertanyaan->tag);
        $user_pertanyaan = User::find($pertanyaan->id_user);

        $jawaban = Jawaban::where('id_pertanyaan',$id)->get();
        $user_jawaban = array();
        foreach($jawaban as $j){
            $a = User::find($j->id_user);
            $user_jawaban[] = $a->name;
        }

        return view('pertanyaan.show_pertanyaan', ['pertanyaan' => $pertanyaan, 'user_pertanyaan' => $user_pertanyaan, 'tag' => $tag, 'jawaban' => $jawaban, 'user_jawaban' => $user_jawaban]);
    }

    public function user_only(){
        $pertanyaan = Pertanyaan::where('id_user',Auth::id())->get();

        return view('pertanyaan.pertanyaan_user.index', ['pertanyaan' => $pertanyaan]);
    }

    public function detail($id){
        $pertanyaan = Pertanyaan::find($id);
        $tag = explode(',',$pertanyaan->tag);

        return view('pertanyaan.pertanyaan_user.detail', ['pertanyaan' => $pertanyaan, 'tag' => $tag]);
    }

    public function edit($id){
        $pertanyaan = Pertanyaan::find($id);

        return view('pertanyaan.pertanyaan_user.edit_pertanyaan', ['pertanyaan' => $pertanyaan]);
    }

    public function update(Request $request){
        Pertanyaan::where('id', $request->id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tag' => $request->tag
        ]);

        return redirect('/detail-pertanyaan');
    }

    public function delete($id){
        Pertanyaan::find($id)->delete();

        return redirect('/detail-pertanyaan');
    }
}
