<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use App\User;
use App\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function pertanyaan_upvote($id_pertanyaan){
        $pertanyaan = Pertanyaan::find($id_pertanyaan);
        $vote = $pertanyaan->poin_vote + 1;

        $user = User::find($pertanyaan->id_user);
        $reputasi = $user->reputasi + 10;

        Pertanyaan::where('id',$id_pertanyaan)->update([
            'poin_vote' => $vote
        ]);

        User::where('id',$user->id)->update([
            'reputasi' => $reputasi
        ]);

        return redirect()->back();
    }

    public function pertanyaan_downvote($id_pertanyaan){
        $pertanyaan = Pertanyaan::find($id_pertanyaan);
        $vote = $pertanyaan->poin_vote - 1;

        $user = User::find($pertanyaan->id_user);
        $reputasi = $user->reputasi - 1;

        Pertanyaan::where('id',$id_pertanyaan)->update([
            'poin_vote' => $vote
        ]);

        User::where('id',$user->id)->update([
            'reputasi' => $reputasi
        ]);

        return redirect()->back();
    }

    public function jawaban_upvote($id_jawaban){
        $jawaban = Jawaban::find($id_jawaban);
        $vote = $jawaban->poin_vote + 1;

        $user = User::find($jawaban->id_user);
        $reputasi = $user->reputasi + 10;

        Jawaban::where('id', $id_jawaban)->update([
            'poin_vote' => $vote
        ]);

        User::where('id', $user->id)->update([
            'reputasi' => $reputasi
        ]);

        return redirect()->back();
    }

    public function jawaban_downvote($id_jawaban){
        $jawaban = Jawaban::find($id_jawaban);
        $vote = $jawaban->poin_vote - 1;

        $user = User::find($jawaban->id_user);
        $reputasi = $user->reputasi - 1;

        Jawaban::where('id', $id_jawaban)->update([
            'poin_vote' => $vote
        ]);

        User::where('id', $user->id)->update([
            'reputasi' => $reputasi
        ]);

        return redirect()->back();
    }
}
