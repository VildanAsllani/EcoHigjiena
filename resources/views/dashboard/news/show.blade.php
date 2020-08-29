@extends('layouts.admin')

@section('content')
<div class="dashboard-content">
    <div class="content">
        <div class="center-container news-div">
            <div class="img-cover">
                <img src="{{asset('/storage/cover_image/'.$news->image_name)}}">
                {{-- <img src="{{asset('images/coverbg.jpg')}}"> --}}
            </div>
            <div class="news-content">
                <a href="{{route('news.index')}}"><span class="fas fa-angle-left back-svg-button"></span></a>
                <h2>{{$news->title}}</h2>
                {{-- <h2>{{$news->slug}}</h2> --}}
                <small>{{$news->created_at}}</small><br><br>
                <p>
                    {!!$news->text!!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection