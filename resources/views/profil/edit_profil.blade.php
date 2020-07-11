@extends('layouts.master')

@section('head_title', 'Edit Profil')

@section('konten')
    <h2 class="mb-4">Edit Profil</h2>

    <div class="card shadow mb-3">
        <div class="card-body">
            <form action="/profil/edit" method="POST">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="name_user">Nama :</label>
                    <input type="text" name="name" id="name_user" class="form-control" value="{{$user->name}}" placeholder="Nama..." required>
                </div>
                <div class="form-group">
                    <label for="email_user">Email :</label>
                    <input type="text" name="email" id="email_user" class="form-control" value="{{$user->email}}" placeholder="Email..." required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/profil" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
@endsection
