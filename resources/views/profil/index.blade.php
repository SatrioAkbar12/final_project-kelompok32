@extends('layouts.master')

@section('head_title', 'Profil')

@section('active_profil', 'active')

@section('konten')
    <h2 class="mb-4">Profil Dirimu</h2>

    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://www.cornwallbusinessawards.co.uk/wp-content/uploads/2017/11/dummy450x450.jpg" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-3">
                            Nama
                        </div>
                        <div class="col-9">
                            : {{$user->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Reputasi
                        </div>
                        <div class="col-9">
                            : {{$user->reputasi}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Email
                        </div>
                        <div class="col-9">
                            : {{$user->email}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Dibuat pada
                        </div>
                        <div class="col-9">
                            : {{$user->created_at}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Diperbarui pada
                        </div>
                        <div class="col-9">
                            : {{$user->updated_at}}
                        </div>
                    </div>
                    <a href="profil/edit" class="btn btn-primary mt-3">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
