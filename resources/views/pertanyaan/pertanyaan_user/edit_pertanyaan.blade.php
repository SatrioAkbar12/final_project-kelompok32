@extends('layouts.master')

@section('head_title', 'Edit Pertanyaan')

@push('script_head')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('konten')
    <h2 class="mb-4">Buat Pertanyaan Baru</h2>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/detail-pertanyaan/{{$pertanyaan->id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$pertanyaan->id}}">
                <div class="form-group">
                    <label for="judul_pertanyaan">Judul Pertanyaan</label>
                    <input type="text" class="form-control " id="judul_pertanyaan" name="judul" value="{{$pertanyaan->judul}}" placeholder="Judul Pertanyaan..." required>
                </div>
                <div class="form-group">
                    <label for="isi_pertanyaan">Isi Pertanyaan</label>
                    <textarea name="isi" id="isi_pertanyaan" class="form-control my-editor" placeholder="Isi pertanyaan...">{!! $pertanyaan->isi !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="tag_pertanyaan">Tag</label>
                    <input type="text" class="form-control" id="tag_pertanyaan" name="tag" value="{{$pertanyaan->tag}}" placeholder="Controh : tag 1,tag 2,tag 3,..." required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/detail-pertanyaan" class="btn btn-danger">Batal</a>
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
