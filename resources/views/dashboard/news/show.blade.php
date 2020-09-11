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
        <div class="comment-section">
            Comments waiting to be approved
            @foreach ($news->notConfirmedComments as $comment)
            <div class="comment">
                <div class="top">
                    <p><strong>{{$comment->name}}</strong> - <small>{{$comment->email}} - {{$comment->created_at}}</small></p>
                    <div>
                    <a href="{{route('confirm',$comment)}}"><i class="fas fa-check"></i></a>
                        <a href="#" onclick="event.preventDefault();document.getElementById('remove-comment').submit();"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <p>
                    {{$comment->comment}}
                </p>
            </div>
            @endforeach
        </div>
        <table id="example" class="ui celled table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Approved</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news->comments as $comment)
                    <tr>
                        <td>{{$comment->name}} / <small>{{$comment->email}}</small></td>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->confirmed}}</td>
                        <td>
                            <a href="#" onclick="event.preventDefault();document.getElementById('remove-comment').submit();" class="btn btn-trash"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Approved</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    
@isset($comment)
    <form id="remove-comment" action="{{ route('comments.destroy',$comment) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE') 
    </form>
@endisset
<form id="remove-item" action="{{ route('news.destroy',$news) }}" method="POST" class="d-none">
    @csrf
    @method('DELETE') 
</form>
@endsection