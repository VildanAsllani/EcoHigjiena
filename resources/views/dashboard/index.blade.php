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
    <div class="content_stats">
        <div class="column_2">
            <a href="{{route('news.index')}}">
                <div class="column_top column_background_color">
                <h4>News</h4>
                <h1>{{$news->count()}}</h1>
                </div>
            </a>
            <a href="{{route('auctions.index')}}">
                <div class="column_bottom column_background_color">
                    <h4>Auctions</h4>
                    <h1>{{$auctions->count()}}</h1>
                </div>
            </a>
        </div>
        <a href="{{route('news.index')}}">
            <div class="column column_background_color">
                <div class="column-header"></div>
                <div class="column-body">
                    <h1>{{$comments->count()}}</h1><small>{{$notConfirmed}}</small>
                </div>
                <div class="column-footer">
                    <p>Comments</p>
                </div>
            </div>
        </a>
        <a href="{{route('subscribers.index')}}">
            <div class="column column_background_color">
                <div class="column-header"></div>
                <div class="column-body">
                <h1>{{$subscribers->count()}}</h1>
                </div>
                <div class="column-footer">
                    <p>Subscribers</p>
                </div>
            </div>
        </a>
        <a href="{{route('gallery.index')}}">
            <div class="column column_background_color">
                <div class="column-header"></div>
                <div class="column-body">
                    <h1>{{$gallery->count()}}</h1>
                </div>
                <div class="column-footer">
                    <p>Gallery</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection