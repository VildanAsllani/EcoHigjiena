<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    @stack('styles')
    @stack('scripts')


</head>
<body>
<div class="dashboard">
    <div class="dashboard_navigation">
        <ul>
            <a href="{{route('dashboard')}}"><li class="{{ (request()->is('dashboard')) ? 'li-active' : '' }}">Dashboard<i class="fas fa-home"></i></li></a>
            <a href="{{route('news.index')}}"><li class="{{ (request()->segment(2) == 'news') ? 'li-active' : '' }}">News<i class="fas fa-newspaper"></i></li></a>
            <a href="{{route('auctions.index')}}"><li class="{{ (request()->segment(2) == 'auctions') ? 'li-active' : '' }}">Auction<i class="fas fa-gavel"></i></li></a>
            <a href="#"><li>Messages<i class="fas fa-comment-alt"></i></li></a>
            <a href="#"><li>Gallery<i class="fas fa-images"></i></li></a>
            <a href="#"><li>Subscribers<i class="fas fa-envelope-open-text"></i></li></a>
            <a href="#"><li>Profile<i class="fas fa-user"></i></li></a> 
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><li class="li-logout">Logout<i class="fas fa-sign-out-alt"></i></li></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
    <div class="dashboard_content">
        @yield('content')
    </div>

    @include('sweetalert::alert')
</div>
</body>
</html>