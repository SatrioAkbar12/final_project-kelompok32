@extends('layouts.master')

@section('head_title', 'Edit Pertanyaan')

@section('konten')
    <h2 class="mb-4">Edit Pertanyaan</h2>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/home" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul_pertanyaan">Judul Pertanyaan</label>
                    <input type="text" class="form-control " id="judul_pertanyaan" name="judul" value="{{old('judul')}}" placeholder="Judul Pertanyaan..." required>
                </div>
                <div class="form-group">
                    <label for="isi_pertanyaan">Isi Pertanyaan</label>
                    <textarea class="form-control" id="isi_pertanyaan" name="isi" placeholder="Isi pertanyaan..." required>{{old('isi')}}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/home" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
@endsection
