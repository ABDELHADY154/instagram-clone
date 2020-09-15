@extends('layouts.app')

@section('title','Settings')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-setting-tab" data-toggle="pill"
                                    href="#v-pills-setting" role="tab" aria-controls="v-pills-setting"
                                    aria-selected="true">Account Settings</a>
                                <hr>
                                <a class="nav-link" id="v-pills-password-tab" data-toggle="pill"
                                    href="#v-pills-password" role="tab" aria-controls="v-pills-password"
                                    aria-selected="true">Password Change</a>
                            </div>
                            <hr>
                        </div>
                        <div class="col-9 text-center border-left">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-setting" role="tabpanel"
                                    aria-labelledby="v-pills-setting-tab">
                                    <h3>Click to disable your account</h3>
                                    <a href="{{route('profile.disable')}}" class="btn btn-danger">Disable Account</a>
                                </div>
                                <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                                    aria-labelledby="v-pills-password-tab">
                                    <br>
                                    <form class="user" method="POST" action="{{route('profile.updatePassword')}}"
                                        class="mt-3">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="New Password"
                                                    @error('password') is-invalid @enderror name="password"
                                                    autocomplete="new-password">

                                                @error('password')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="Repeat Password"
                                                    name="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Change</button>
                                        {{-- <a type="submit" class="btn btn-primary">Change Password</a> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
