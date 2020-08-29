<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">


</head>
<body>

<div class="full-container">
    <div class="dashboard-navigation">
        <ul>
            <a href="{{route('dashboard')}}"><li class="{{(request()->is('dashboard')) ? 'li-active' : '' }}">Dashboard<i class="fas fa-home"></i></li></a>
            <a href="{{route('news.index')}}"><li class="{{ (request()->segment(2) == 'news') ? 'li-active' : '' }}">News<i class="fas fa-newspaper"></i></li></a>
            <a href="#"><li class="{{ (request()->segment(2) == 'auctions') ? 'li-active' : '' }}">Auction<i class="fas fa-gavel"></i></li></a>
            <a href="#"><li class="{{ (request()->segment(2) == 'gallery') ? 'li-active' : '' }}">Gallery<i class="fas fa-images"></i></li></a>
            <a href="#"><li>Subscribers<i class="fas fa-images"></i></li></a>
            <a href="#"><li>Activity<i class="fas fa-chart-line"></i></li></a>
            <a href="#"><li>Profdile<i class="fas fa-user"></i></li></a>

            {{-- <li class="li-active">Dashboard<i class="fas fa-home"></i></li>
            <li>News<i class="fas fa-newspaper"></i></li>
            <li>Auction<i class="fas fa-gavel"></i></li>
            <li>Gallery<i class="fas fa-images"></i></li>
            <li>Subscribers<i class="fas fa-images"></i></li>
            <li>Activity<i class="fas fa-chart-line"></i></li>
            <li>Profile<i class="fas fa-user"></i></li> --}}
        </ul>
        <ul class="logout-ul">
            <a href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <li>Logout<i class="fas fa-sign-out-alt"></i></li>
            </a>
            {{-- <li>Logout<i class="fas fa-sign-out-alt"></i></li> --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
    @yield('content')
</div>
</body>
</html>