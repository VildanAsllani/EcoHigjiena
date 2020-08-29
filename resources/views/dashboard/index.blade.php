@extends('layouts.admin')
@section('title') Admin Dashboard @endsection

@section('content')
<div class="dashboard-content">
    <div class="content">
        <div class="grid-row">
            <a href="#">
                <div class="column">
                    <div class="column-header"></div>
                    <div class="column-body">
                        <h1>14</h1>
                    </div>
                    <div class="column-footer">
                        <p>SUBSCRIBER</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="column">
                    <div class="column-header"></div>
                    <div class="column-body">
                        <h1>322</h1><small>13 new</small>
                    </div>
                    <div class="column-footer">
                        <p>COMMENTS</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="column">
                    <div class="column-header">
                        <p>News 14</p>
                        <p>Auction 20</p>
                    </div>
                    <div class="column-body">
                        <h1>{{$news->count()}}</h1>
                    </div>
                    <div class="column-footer">
                        <p>POSTS</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="column">
                    <div class="column-header"></div>
                    <div class="column-body">
                        <h1>14</h1>
                    </div>
                    <div class="column-footer">
                        <p>MESSAGES</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="column">
                    <div class="column-header"></div>
                    <div class="column-body">
                        <h1>14</h1>
                    </div>
                    <div class="column-footer">
                        <p>IMAGES</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection