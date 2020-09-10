@extends('layouts.admin')

@section('content')
            <div class="content" style="width:100%;margin-top:0px;margin-right: 0px;margin-left: 0px;">
        <a href="{{asset('storage/cover_image/'.$news->image_name)}}"><img src="{{asset('storage/cover_image/'.$news->image_name)}}" class="post-image"></a>
        <div class="post-content">
            <a href="{{route('news.index')}}" class="btn-show-back"><i class="fas fa-arrow-left"></i></a>
            <div class="post-title">
                <h1>{{$news->title}}</h1>
            </div>
            <div class="post-body">
                {!! $news->text !!}
            </div>
            <div class="post-footer">
                {{-- <a href="/" class="btn btn-default">Download</a> --}}
                <div>
                    <a href="{{route('news.edit',$news)}}" class="btn btn-edit">Edit</a>
                    <a href="/" class="btn btn-trash"
                    onclick="event.preventDefault();document.getElementById('remove-item').submit();">Delete</a>
                 </div>
            </div>
        </div>



<form id="remove-item" action="{{ route('news.destroy',$news) }}" method="POST" class="d-none">
    @csrf
    @method('DELETE') 
</form>
@endsection