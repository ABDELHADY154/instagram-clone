@extends('layouts.app')

@section('title','Profile')
@section('content')

@if($user->id == Auth::user()->id)
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
                    <a href="{{route('profile.edit')}}" class="btn profilee-edit-btn">Edit Profile</a>
                    <a href="{{route('profile.setting')}}" class="btn profilee-settings-btn"
                        aria-label="profilee settings"><i class="fas fa-cog" aria-hidden="true"></i></a>
                </div>

                <div class="profilee-stats">
                    <ul class="">
                        <li><span class="profilee-stat-count">{{count($posts)}}</span> posts</li>
                        <li><a href="{{route('profile-followers')}}" style="text-decoration: none;color:black"><span
                                    class="profilee-stat-count">{{$user->followers()->count()}}</span>
                                followers</a></li>
                        <li><a href="{{route('profile-following')}}" style="text-decoration: none;color:black"><span
                                    class="profilee-stat-count">{{$user->followings()->count()}}</span>
                                following</a></li>

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
<div class="row justify-content-center">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active btn btn-outline-secondary" id="pills-home-tab" data-toggle="pill"
                href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-th"></i>
                Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-outline-secondary" id="pills-profile-tab" data-toggle="pill"
                href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i
                    class="far fa-bookmark"></i> Saved Posts</a>
        </li>

    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="container-img">
                <div class="gallery">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-4">
                            <div class="gallery-item mt-4" tabindex="0">
                                <div class="gallery-image" style="">
                                    <img src="{{asset('storage/images/posts/'. $post->image) }}" class="gallery-image"
                                        alt="">
                                </div>
                                <a href="{{route('post.show',$post)}}" style="color:white">
                                    <div class="gallery-item-info">
                                        <ul>
                                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i
                                                    class="fas fa-heart" aria-hidden="true"></i> {{$post->like_no}}</li>
                                            <li class="gallery-item-comments"><span
                                                    class="visually-hidden">Comments:</span><i class="fas fa-comment"
                                                    aria-hidden="true"></i> {{$post->comment_no}}</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="loader"></div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="container-img">
                <div class="gallery">
                    <div class="row">
                        @if(isset($savedPosts))
                        @foreach($savedPosts as $savedPost)
                        <div class="col-4">
                            <div class="gallery-item mt-4" tabindex="0">
                                <div class="gallery-image" style="">
                                    <img src="{{ asset('storage/images/posts/'. $savedPost->image) }}"
                                        class="gallery-image" alt="">
                                </div>
                                <a href="{{route('post.show',$savedPost)}}" style="color:white">
                                    <div class="gallery-item-info">
                                        <ul>
                                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i
                                                    class="fas fa-heart" aria-hidden="true"></i> {{$savedPost->like_no}}
                                            </li>
                                            <li class="gallery-item-comments"><span
                                                    class="visually-hidden">Comments:</span><i class="fas fa-comment"
                                                    aria-hidden="true"></i> {{$savedPost->comment_no}}</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
                <div class="loader"></div>
            </div>
        </div>
    </div>
</div>
@else
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
                    @if(Auth::user()->isFollowing($user))
                    <a class="btn profilee-edit-btn">is following</a>
                    <a href="{{route('unfollow-user',$user->id)}}" class="btn profilee-settings-btn"
                        aria-label="profilee settings"><i class="fas fa-user-times"></i></a>
                    @else
                    <a href="{{route('follow-user',$user->id)}}" class="btn profilee-edit-btn btn-primary">
                        {{$user->isFollowing(Auth::user())?'Follow Back':'Follow'}}
                    </a>
                    @endif
                </div>
                <div class="profilee-stats">

                    <ul class="">
                        <li><span class="profilee-stat-count">{{count($posts)}}</span> posts</li>
                        <li><a href="{{route('followers-list',$user->id)}}"
                                style="text-decoration: none;color:black"><span
                                    class="profilee-stat-count">{{$user->followers()->count()}}</span>
                                followers</a></li>
                        <li><a href="{{route('following-list',$user->id)}}"
                                style="text-decoration: none;color:black"><span
                                    class="profilee-stat-count">{{$user->followings()->count()}}</span>
                                following</a></li>
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
                        <img src="{{ asset('storage/images/posts/'. $post->image) }}" class="gallery-image" alt="">
                    </div>
                    <a href="{{route('post.show',$post)}}" style="color:white">
                        <div class="gallery-item-info">
                            <ul>
                                <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i
                                        class="fas fa-heart" aria-hidden="true"></i> {{$post->like_no}}</li>
                                <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i
                                        class="fas fa-comment" aria-hidden="true"></i> {{$post->comment_no}}</li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="loader"></div>
</div>
@endif
@endsection
