@extends('layouts.auth')
@section('content')
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4" style="font-family: 'Sacramento'; font-size: 50px">Instagram</h1>
    </div>
    <form class="user" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control form-control-user" @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password"
                autocomplete="current-password">

            @error('password')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Login') }}
        </button>
        <hr>
        <a href="{{route('login-facebook')}}" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
        </a>

        <div class="text-center">
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>

    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="{{route('register')}}">Create an Account!</a>
    </div>
</div>

@endsection
