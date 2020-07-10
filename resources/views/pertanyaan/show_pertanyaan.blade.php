@extends('layouts.master')

@section('head_title')
    {{$pertanyaan->judul}}
@endsection

@push('script_head')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('konten')
    <h2 class="mb-4">{{$pertanyaan->judul}}</h2>
    <p class="ml-4"><strong>Dibuat pada {{$pertanyaan->created_at}}, oleh {{$user_pertanyaan->name}}</strong></p>

    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-1 border-right text-center">
                <div style="margin:70% 22%; position:center;" >
                    <button class="btn btn-light btn-circle"><i class="fas fa-fw fa-arrow-up"></i></button>
                        <br>Vote<br>
                    <button class="btn btn-light btn-circle"><i class="fas fa-fw fa-arrow-down"></i></button>
                </div>
            </div>
            <div class="col-11" style="padding-left: 0">
                <div class="card-body">
                    {!! $pertanyaan->isi !!}
                    <p>Tag :<br>
                        @foreach ($tag as $t)
                            <button class="btn btn-info">{{$t}}</button>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mb-3">Jawaban</h3>

    <div class="card shadow mb-4">
        <div class="card-body">
            @if(count($jawaban) == 0)
                <h6>Masih belum ada jawaban nih!</h6>
            @else
                <h4>Jawaban Terpilih!</h4>
                @if($pertanyaan->id_jawabanTepat == null)
                    <div class="card border-left-primary mb-5 ml-4">
                        <div class="card-body">
                            <h6>Belum ada jawaban yang terpilih!</h6>
                        </div>
                    </div>
                @else
                    <div class="card border-left-primary mb-5 ml-4">
                        <div class="card-header">

                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                @endif

                <h4>Jawaban lainnya</h4>
                @for($i=0; $i<count($jawaban); $i++)
                    <div class="card border-left-success mb-3 ml-4">
                        <div class="row">
                            <div class="col-1 border-right text-center">
                                <div style="margin:22px 20%;">
                                    <button class="btn btn-light btn-circle"><i class="fas fa-fw fa-arrow-up"></i></button>
                                        <br>Vote<br>
                                    <button class="btn btn-light btn-circle"><i class="fas fa-fw fa-arrow-down"></i></button>
                                </div>
                            </div>
                            <div class="col-11" style="padding-left: 0">
                                <div class="card-header">
                                    {{ $user_jawaban[$i] }}
                                </div>
                                <div class="card-body">
                                    {!! $jawaban[$i]->isi !!}
                                    <div class="text-right">
                                        {{ $jawaban[$i]->created_at }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endfor
            @endif
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header bg-info">
            <h5 class="text-light">Buat Jawabanmu Sendiri!</h5>
        </div>
        <div class="card-body">
            <form action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
                @csrf

                <textarea name="isi" class="form-control my-editor">{!! old('isi', $isi ?? '') !!}</textarea>

                <button type="submit" class="mt-2 btn btn-primary">Jawab!</button>
            </form>
        </div>
    </div>

@endsection

@push('script_body')
  <script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>
@endpush
