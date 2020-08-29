@extends('layouts.admin')

@section('content')
<div class="dashboard-content">
    <div class="content">
        <form action="{{route('news.store')}}" method="POST" class="form-style" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="title" class="input-text" placeholder="Type the title" value="{{old('title')}}">
                @error('title')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="file" name="image_name" class="input-file" value="{{old('image_name')}}">
                @error('image_name')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea name="text" cols="50" rows="15" class="input-textarea" id="summary-ckeditor">{{old('text')}}</textarea>
                @error('text')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <input type="submit" value="Publish post" class="btn btn-primary input-submit float-right">
        </form>
    </div>
</div>
{{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor',{
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection

