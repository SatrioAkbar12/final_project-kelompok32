@extends('layouts.master')

@section('head_title','Pertanyaanmu')

@push('script_head')
    <link href="{{asset('/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('active_pertanyaanmu', 'active');

@section('konten')
    <h2 class="mb-4">Pertanyaanmu</h2>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-light">
            Pertanyaan yang telah dibuat
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pertanyaan as $p)
                            <tr>
                                <td>{{$p->judul}}</td>
                                <td>
                                    <form action="/detail-pertanyaan/{{$p->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/detail-pertanyaan/{{$p->id}}" class="btn btn-info">Detail</a>
                                        <a href="/detail-pertanyaan/{{$p->id}}/edit" class="btn btn-warning">Edit</a>
                                        <input type="submit" class="btn btn-danger" value="Hapus">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
