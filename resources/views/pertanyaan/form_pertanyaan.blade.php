@extends('layouts.master')

@section('head_title', 'Buat Pertanyaan Baru')

@push('script_head')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('konten')
    <h2 class="mb-4">Buat Pertanyaan Baru</h2>

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
                    <textarea name="isi" id="isi_pertanyaan" class="form-control my-editor" placeholder="Isi pertanyaan...">{!! old('isi', $isi ?? '') !!}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="/home" class="btn btn-danger">Batal</a>
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
