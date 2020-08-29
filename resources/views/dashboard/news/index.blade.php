@extends('layouts.admin')
{{-- @section('title') Admin Dashboard @endsection --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css">
@section('content')
<div class="dashboard-content">
    <div class="content">
        <div class="flex-row">
            <h2>News</h2>
            <a href="{{route('news.create')}}" class="btn btn-default">add post</a>
        </div>
        <table id="example" class="ui celled table" style="width:100%">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Post</th>
                    <th>Created at</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $news_item)
                    <tr>
                        <td><img src="{{asset('/storage/cover_image/'.$news_item->image_name)}}" class="img-cover"></td>
                        <td>{{$news_item->title}}</td>
                        <td>
                            {{Str::limit($news_item->text, 40)}}
                        </td>
                        <td>{{$news_item->created_at}}</td>
                        <td>
                            <form action="{{route('news.destroy',$news_item->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <a href="#" class="btn btn-default"><i class="fas fa-edit"></i></a><br>
                            <a href="{{route('news.show',$news_item->id)}}" class="btn btn-default"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Post</th>
                    <th>Created at</th>
                    <th>Modify</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>