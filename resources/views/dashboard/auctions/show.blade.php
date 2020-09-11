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
        <a href="{{asset('storage/cover_image/'.$auction->image_name)}}"><img src="{{asset('storage/cover_image/'.$auction->image_name)}}" class="post-image"></a>
        <div class="post-content">
            <a href="{{route('auctions.index')}}" class="btn-show-back"><i class="fas fa-arrow-left"></i></a>
            <div class="post-title">
                <h1>{{$auction->title}}</h1>
            </div>
            <div class="post-body">
                {!! $auction->text !!}
            </div>
            <div class="post-footer">
                @if ($auction->attachment_name === 'empty')
                        empty
                    @else
                        <a href="{{asset('storage/attachment_name/'.$auction->attachment_name)}}" class="btn btn-default">Attachment</a>
                    @endif
                <div>
                    <a href="{{route('auctions.edit',$auction)}}" class="btn btn-edit">Edit</a>
                    <a href="/" class="btn btn-trash"
                    onclick="event.preventDefault();document.getElementById('remove-item').submit();">Delete</a>
                 </div>
            </div>
        </div>
    </div>

<form id="remove-item" action="{{ route('auctions.destroy',$auction) }}" method="POST" class="d-none">
    @csrf
    @method('DELETE') 
</form>
@endsection