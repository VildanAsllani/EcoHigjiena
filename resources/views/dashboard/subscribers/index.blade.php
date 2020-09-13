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
        <h2>Subscribers</h2>
    </div>
    <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>Email</th>
                <th>Subscribed</th>
                <th>Confirmed</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscribers as $subscriber)
            <tr>
                <td>{{$subscriber->email}}</td>
                <td>{{$subscriber->created_at}}</td>
                <td>{{$subscriber->confirmed}}</td>
                <td>
                    <form action="{{ route('subscribers.destroy',$subscriber) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-trash btn-delete"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Email</th>
                <th>Subscribed</th>
                <th>Confirmed</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
