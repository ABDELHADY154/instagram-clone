@extends('layouts.app')

@section('title','Profile')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="profilee">

                <div class="profilee-image">

                    <img class="is-rounded" src="{{ asset('images/avatar/'. $user->image) }}"
                        style="width: 11rem; height: 11rem;">

                </div>

                <div class="profilee-user-settings">

                    <h1 class="profilee-user-name">{{$user->user_name}}</h1>

                    <button class="btn profilee-edit-btn">Edit Profilee</button>

                    <button class="btn profilee-settings-btn" aria-label="profilee settings"><i class="fas fa-cog"
                            aria-hidden="true"></i></button>

                </div>

                <div class="profilee-stats">

                    <ul class="">
                        <li><span class="profilee-stat-count">164</span> posts</li>
                        <li><span class="profilee-stat-count">188</span> followers</li>
                        <li><span class="profilee-stat-count">206</span> following</li>
                    </ul>

                </div>

                <div class="profilee-bio">

                    <p><span class="profilee-real-name">{{$user->name}}</span><br>Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit. Quas veniam error unde nemo dolorem quod dolore ducimus
                        temporibus. Blanditiis nisi voluptate, adipisci voluptatibus incidunt error similique nostrum
                        voluptas soluta temporibus. {{$user->bio}} <br> {{$user->website}}
                    </p>

                </div>

            </div>
        </div>


    </div>

</div>



{{-- <div class="card bg-transparent">

            <div class="card-body text-center"> --}}


{{-- <div class="col-3">
                    <img class="is-rounded p-3" src="{{ asset('images/avatar/'. $user->image) }}"
style="width: 11rem; height: 11rem;">
</div>
<div class="col">
    <div class="row">
        <div class="col-3">
            <h2>{{$user->user_name}}</h2>

        </div>
        <span class="col-4">
            <a href="#" class="btn btn-outline-dark">Edit Profile</a>
        </span>
        <div class="col-2">elshamy</div>
    </div>
</div> --}}
{{-- </div> --}}




@endsection
