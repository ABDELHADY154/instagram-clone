@extends('layouts.auth')

@section('content')
<div class="">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4" style="font-family: 'Sacramento'; font-size: 50px">Instagram</h1>
        </div>
        <form class="user" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="User Name"
                    @error('user_name') is-invalid @enderror name="user_name" value="{{ old('user_name') }}"
                    autocomplete="user_name" autofocus>

                @error('user_name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Full Name"
                    @error('name') is-invalid @enderror name="name" value="{{ old('name') }}" autocomplete="name"
                    autofocus>

                @error('name')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Email Address" @error('email') is-invalid @enderror name="email"
                    value="{{ old('email') }}" autocomplete="email">

                @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Phone Number" @error('phone_number') is-invalid @enderror name="phone_number"
                    value="{{ old('phone_number') }}" autocomplete="phone_number">

                @error('phone_number')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        placeholder="Password" @error('password') is-invalid @enderror name="password"
                        autocomplete="new-password">

                    @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                        placeholder="Repeat Password" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>

            <div class="form-group text-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male"
                        @error('gender') is-invalid @enderror value="{{ old('gender') }}">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female"
                        @error('gender') is-invalid @enderror value="{{ old('gender') }}">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="text-center">
                    @error('gender')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror</div>

            </div>


            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Register') }}
            </button>

            <hr>
            <a href="{{route('login-facebook')}}" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
            </a>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
        </div>
    </div>
</div>
@endsection
