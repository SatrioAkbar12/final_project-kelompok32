@extends('layouts.master')

@section('head_title', '{{$pertanyaan->judul}}')

@section('konten')
    <h2 class="mb-4">{{$pertanyaan->judul}}</h2>

    <div class="card shadow mb-4">
        <div class="card-body">
                <p>{{$pertanyaan->isi}}</p>

        </div>
    </div>
    <h3>Jawaban</h3>
    @foreach ($jawaban as $item_jawaban)
        <p>{{$item_jawaban->isi}}</p>

    @endforeach



    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/pertanyaan/{{$pertanyaan->id}}/" method="POST">
                @csrf
                <div class="form-group">
                    <label for="isi">Jawaban Anda</label>
                    <input type="text" class="form-control " id="isi_jawaban" name="isi" value="" placeholder="" >
                    <input type="text" id="id_pertanyaan" name="id_pertanyaan" value="{{$pertanyaan->id}}"hidden >
                </div>


                <button type="submit" class="btn btn-success">Komentar</button>

            </form>
        </div>
    </div>
@endsection
