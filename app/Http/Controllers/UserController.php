<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('profil.index', ['user' => $user]);
    }

    public function edit(){
        $user = Auth::user();

        return view('profil.edit_profil', ['user' => $user]);
    }

    public function update(Request $request){
        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('/profil');
    }
}
