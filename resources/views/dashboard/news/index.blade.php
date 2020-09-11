@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endpush
@section('content')
<div class="content">
    <div class="flex-row m-none">
        <h2>News</h2>
        <a href="{{route('news.create')}}" class="btn btn-default">Create new</a>
    </div>
    <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Comments</th>
                <th>Published</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $news_item)
            <tr>
                <td><img src="{{asset('storage/cover_image/'.$news_item->image_name)}}" alt="Post thumbnail" class="img-cover"></td>
                <td>{{$news_item->title}}</td>
                <td>
                    <center><h3>{{$news_item->comments->count()}}</h3><br>
                        @if ($news_item->notConfirmedComments->count()!==0)
                            <span class="span-new-message">new {{$news_item->notConfirmedComments->count()}}</span>
                        @endif</center>
                    {{-- Confirmed={{$news_item->confirmedComments->count()}}<br>
                    Not confirmed={{$news_item->notConfirmedComments->count()}} --}}
                </td>
                {{-- <td>{{$news_item->created_at}}</td> --}}
                <td>{{$news_item->created_at}}</td>
                <td><a href="{{route('news.show',$news_item)}}" class="btn btn-default"><i class="far fa-eye"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Comments</th>
                <th>Published</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
