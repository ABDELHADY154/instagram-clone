@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="p-5">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email" class="col col-form-label text-left">{{ __('E-Mail Address') }}</label>


                    <input id="email" type="email"
                        class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="password" class="col col-form-label text-left">{{ __('Password') }}</label>


                    <input id="password" type="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                        class="col col-form-label text-left">{{ __('Confirm Password') }}</label>


                    <input id="password-confirm" type="password" class="form-control form-control-user"
                        name="password_confirmation" required autocomplete="new-password">

                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
