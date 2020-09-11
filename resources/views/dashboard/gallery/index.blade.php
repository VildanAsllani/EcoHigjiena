@extends('layouts.admin')

@section('content')
    <div class="content">
        <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data"  class="gallery_form">
            @csrf
            <div>
                <label for="file-upload" class="custom-file-upload">
                    <i class="fas fa-cloud-upload-alt"></i>Select image
                </label>
                <input id="file-upload" type="file" name="image_name" required/>
                <input type="submit" value="Upload Image">
                @error('image_name')
                    <span class="invalid-feedback">
                        <strong><i class="fas fa-exclamation-triangle"></i>{{$message}}</strong>
                    </span>
                @enderror
            </div>
        </form>
        <div class="content_gallery">
            @foreach ($galleries as $gallery)
            <a href="/storage/gallery/{{$gallery->image_name}}" class="a-link">
                    <div class="gallery_item">
                        <img src="{{asset('storage/gallery/'.$gallery->image_name)}}" alt="">
                        {{-- <object><a href="" class="btn btn-trash btn-delete" onclick="event.preventDefault();document.getElementById('delete-image').submit();"><i class="fas fa-trash"></i></a></object> --}}
                        <form action="{{ route('gallery.destroy',$gallery) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-trash btn-delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </a>
            @endforeach
            {{-- <a href="{{asset('images/gallery/aerial-view-931721_1920.jpg')}}" class="a-link">
                <div class="gallery_item">
                    <img src="/images/gallery/aerial-view-931721_1920.jpg" alt="">
                    <object><a href="#" class="btn btn-trash btn-delete"><i class="fas fa-trash"></i></a></object>
                </div>
            </a> --}}
        </div>
    </div>
@endsection