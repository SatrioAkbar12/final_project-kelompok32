@extends('layouts.master')

@section('head_title', 'Main Dashboard')

@section('active_dashboard', 'active')

@section('konten')
    <h2 class="mb-3">Pertanyaan - pertanyaan</h2>

    <a href="/pertanyaan/create" class="btn btn-primary mb-5">Buat Pertanyaan Baru</a>

    @if(count($pertanyaan) == 0)
        <div class="card shadow mb-4">
            <div class="card-body">
                <h6>Belum ada pertanyaan yang terdaftar</h6>
            </div>
        </div>
    @else
        @foreach ($pertanyaan as $p)
            <div class="card shadow mb-4 border-left-info">
                <div class="card-header">
                    <a href="/pertanyaan/{{$p->id}}">{{$p->judul}}</a>
                </div>
                <div class="card-body">
                    {{$p->isi}}
                </div>
            </div>
        @endforeach
    @endif
@endsection
