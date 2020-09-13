@extends('layouts.admin')

@section('content')
<div class="content">
    <center><h1 class="faded-text">UPDATE INFORMATION</h1></center>
        <form class="form-style" action="{{route('users.update',Auth::user())}}" method="POST">
            @csrf
            @method('PATCH')
            <a href="{{route('dashboard')}}" class="btn-show-back"><i class="fas fa-arrow-left"></i></a>
            <div class="form-group">
            <input type="text" name="title" class="input-text" placeholder="Your name" value="{{Auth::user()->name}}" disabled>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="input-text" placeholder="Your email" value="{{Auth::user()->email}}" disabled>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="input-text" placeholder="Your password" required>
                @error('password')
                <span class="invalid-feedback">
                <strong><i class="fas fa-exclamation-triangle"></i>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group-2">
                <div class="div">
                    <label>Created at</label>
                    <input type="text" class="input-text" placeholder="{{Auth::user()->created_at}}" disabled>
                </div>
                <div class="div">
                    <label>Updated at</label>
                    <input type="text" class="input-text" placeholder="{{Auth::user()->updated_at}}" disabled>
                </div>
            </div>
            <div class="form-group-button">
                <input type="submit" value="Change password" class="btn btn-primary form-submit-button">
            </div>
        </form>
</div>
@endsection