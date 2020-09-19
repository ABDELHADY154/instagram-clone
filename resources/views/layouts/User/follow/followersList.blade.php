@extends('layouts.app')
@section('title','Followers')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center">Followers List</h3>
            @foreach($users as $user)
            <div class="card mt-3">
                <div class="card-header bg-white">
                    <img src=" {{asset('storage/images/avatars/'. $user->avatar) }}"
                        class="Instagram-card-user-image d-inline">
                    <a class="Instagram-card-user-name"
                        href="{{route('profile.view',$user->id)}}">{{$user->user_name}}</a>
                    <div class="float-right">
                        @if(Auth::user()->isFollowing($user))
                        <a class="btn profilee-edit-btn">is following</a>
                        <a href="{{route('unfollow-user',$user->id)}}" class="btn profilee-settings-btn"
                            aria-label="profilee settings"><i class="fas fa-user-times"></i></a>
                        @elseif(Auth::user()->id==$user->id)
                        @else
                        <a href="{{route('follow-user',$user->id)}}" class="btn profilee-edit-btn btn-primary">
                            {{$user->isFollowing(Auth::user())?'Follow Back':'Follow'}}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
