@extends('layouts.master')

@section('head_title')
    Detail Pertanyaan - {{$pertanyaan->judul}}
@endsection

@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header bg-info text-light">
            <h4>Detail Pertanyaan</h4>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-1">
                    Judul
                </div>
                <div class="col-11">
                    : {{$pertanyaan->judul}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-1">
                    Isi
                </div>
                <div class="col-11">
                    :
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    {!! $pertanyaan->isi !!}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-1">
                    Tag
                </div>
                <div class="col-11">
                    :
                    @foreach ($tag as $t)
                        <button class="btn btn-success ml-1">{{$t}}</button>
                    @endforeach
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-1">
                    Poin
                </div>
                <div class="col-11">
                    : {{$pertanyaan->poin_vote}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2">
                    Dibuat pada
                </div>
                <div class="col-10">
                    : {{$pertanyaan->created_at}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2">
                    Diperbarui pada
                </div>
                <div class="col-10">
                    : {{$pertanyaan->updated_at}}
                </div>
            </div>
        </div>
    </div>

    <a href="/detail-pertanyaan" class="btn btn-warning">Kembali</a>
@endsection
