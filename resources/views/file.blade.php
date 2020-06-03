
@extends('templates.admin')
@section('content')
    <div class="container">
        <textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
        <div class="input-group">
            <span class="input-group-btn">
              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
              </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="filepath">
          </div>
          <img id="holder" style="margin-top:15px;max-height:100px;">
          <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

    </div>
@endsection
@section('js')
 <script>
    var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  $('#lfm').filemanager('file');


</script>
{{-- <script>  --}}
    {{-- // $('textarea.my-editor').ckeditor(options);  --}}
{{--  --}}
     {{-- // CKEDITOR.replace('my-editor', options);  --}}
@endsection

