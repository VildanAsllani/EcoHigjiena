@extends('layouts.admin')


@section('content')
    <div class="content">
        <form action="{{route('news.store')}}" method="POST" class="form-style" enctype="multipart/form-data">
            @csrf
            <div class="form-header">
                <a href="{{route('news.index')}}" class="btn-back"><i class="fas fa-arrow-left"></i></a>
                <h1 class="faded-text">CREATE A POST</h1>
            </div>
            <div class="form-group">
                <label for="title" class="label">TITLE</label>
                <input type="text" id="title" name="title" class="input-text" placeholder="ex: Mbjellja e luleve" value="{{old('title')}}" required>
                @error('title')
                    <span class="invalid-feedback">
                    <strong><i class="fas fa-exclamation-triangle"></i>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="slug" class="label">SLUG</label>
                <input type="text" id="slug" name="slug" class="input-text" value="{{old('slug')}}" required>

            </div> --}}
            <div class="form-group">
                <label for="title" class="label">IMAGE COVER</label>
                <label for="file-upload" class="custom-file-upload">
                    <i class="fas fa-cloud-upload-alt"></i> Choose image
                </label>
                <input id="file-upload" name='image_name' type="file" class="file-hide"/>
                @error('image_name')
                    <span class="invalid-feedback">
                        <strong><i class="fas fa-exclamation-triangle"></i>{{$message}}</strong>
                    </span> 
                @enderror
            </div>
            <div class="form-group">
                <label for="title" class="label">ARTICLE BODY</label>
                <textarea name="text" class="input-textarea" cols="30" rows="20" id="summary-ckeditor" required>{{old('text')}}</textarea>
                @error('text')
                    <span class="invalid-feedback">
                        <strong><i class="fas fa-exclamation-triangle"></i>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group-button">
                <input type="submit" value="Publish post" class="btn btn-primary form-submit-button">
            </div>
        </form>
    </div>
    
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor',{
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection

