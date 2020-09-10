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
            <a href="/">
                <div class="column_top column_background_color">
                    <h4>News</h4>
                    <h1>12</h1>
                </div>
            </a>
            <a href="/">
                <div class="column_bottom column_background_color">
                    <h4>Auctions</h4>
                    <h1>35</h1>
                </div>
            </a>
        </div>
        <a href="#">
            <div class="column column_background_color">
                <div class="column-header"></div>
                <div class="column-body">
                    <h1>322</h1><small>13 new</small>
                </div>
                <div class="column-footer">
                    <p>Messages</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="column column_background_color">
                <div class="column-header"></div>
                <div class="column-body">
                    <h1>3245</h1>
                </div>
                <div class="column-footer">
                    <p>Subscribers</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="column column_background_color">
                <div class="column-header"></div>
                <div class="column-body">
                    <h1>119</h1>
                </div>
                <div class="column-footer">
                    <p>Gallery</p>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="column column_background_color">
                <div class="column-header"></div>
                <div class="column-body">
                    <h1>22</h1>
                </div>
                <div class="column-footer">
                    <p>Comments</p>
                </div>
            </div>
        </a>
    </div>
    <div class="flex-row">
        <h3>New Messages</h3>
        <a href="/">View all</a>
    </div>
    <table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Arrived time</th>
                <th>Reply</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cara Stevens</td>
                <td>cara@gmail.com</td>
                <td>20/04/2020 10:23:44</td>
                <td><a href="#" class="btn btn-default">View</a></td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>cara@gmail.com</td>
                <td>20/04/2020 10:23:44</td>
                <td><a href="#" class="btn btn-default">View</a></td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>cara@gmail.com</td>
                <td>20/04/2020 10:23:44</td>
                <td><a href="#" class="btn btn-default">View</a></td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>cara@gmail.com</td>
                <td>20/04/2020 10:23:44</td>
                <td><a href="#" class="btn btn-default">View</a></td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>cara@gmail.com</td>
                <td>20/04/2020 10:23:44</td>
                <td><a href="#" class="btn btn-default">View</a></td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>cara@gmail.com</td>
                <td>20/04/2020 10:23:44</td>
                <td><a href="#" class="btn btn-default">View</a></td>
            </tr>
        </tbody>
        <tfoot>
            <th>Name</th>
            <th>Email</th>
            <th>Arrived time</th>
            <th>Reply</th>
        </tfoot>
    </table>
</div>
@endsection