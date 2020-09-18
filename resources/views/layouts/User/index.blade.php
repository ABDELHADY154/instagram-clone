@extends('layouts.app')

@section('title','Profile')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="profilee">

                <div class="profilee-image">

                    <img class="is-rounded" src="{{asset('storage/images/avatars/'. $user->avatar) }}"
                        style=" width: 11rem; height: 11rem;">

                </div>

                <div class="profilee-user-settings">

                    <h1 class="profilee-user-name">{{$user->user_name}}</h1>

                    <a href="{{route('profile.edit')}}" class="btn profilee-edit-btn">Edit Profilee</a>

                    <a href="{{route('profile.setting')}}" class="btn profilee-settings-btn"
                        aria-label="profilee settings"><i class="fas fa-cog" aria-hidden="true"></i></a>

                </div>

                <div class="profilee-stats">

                    <ul class="">
                        <li><span class="profilee-stat-count">{{count($posts)}}</span> posts</li>
                        <li><span class="profilee-stat-count">188</span> followers</li>
                        <li><span class="profilee-stat-count">206</span> following</li>
                    </ul>

                </div>

                <div class="profilee-bio">

                    <p><span class="profilee-real-name">{{$user->name}}</span><br>{{$user->bio}}<br>
                        <a href="#">{{$user->website}}</a>
                    </p>

                </div>

            </div>
        </div>



    </div>

</div>
<hr>
<div class="container-img">
    <div class="gallery">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-4">
                <div class="gallery-item mt-4" tabindex="0">

                    <div class="gallery-image" style="">
                        <img src=" {{ asset('images/posts/'. $post->image) }}" class="gallery-image" alt="">
                    </div>

                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i
                                    class="fas fa-heart" aria-hidden="true"></i> {{$post->like_no}}</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i
                                    class="fas fa-comment" aria-hidden="true"></i> {{$post->comment_no}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="loader"></div>
</div>


@endsection
