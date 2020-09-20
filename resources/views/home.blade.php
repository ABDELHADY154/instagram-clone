@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mt-3">
                <div class="card-header bg-white">
                    <img src=" {{asset('storage/images/avatars/'. $post->user->avatar) }}"
                        class="Instagram-card-user-image d-inline">
                    <a class="Instagram-card-user-name"
                        href="{{route('profile.view',$post->user->id)}}">{{$post->user->user_name}}</a>

                </div>
                <div class="Instagram-card-image">
                    <img src="{{ asset('storage/images/posts/'. $post->image) }}" class="gallery-image"
                        style="max-height: 30rem" />
                </div>
                <div class="Instagram-card-content">
                    @if(Auth::user()->hasLiked($post))
                    <a class="footer-action-icons mr-2" href="{{route('unlike',$post->id)}}"
                        style="font-size: 1.5rem; color:#ed4956">
                        <i class="fas fa-heart"></i></a>
                    @else
                    <a class="footer-action-icons mr-2" href="{{route('like',$post->id)}}"
                        style="font-size: 1.5rem ;color:black"><i class="fa fa-heart-o"></i></a>
                    @endif


                    <a class="footer-action-icons" href="{{route('post.show',$post->id)}}"><i class="far fa-comment"
                            style="font-size: 1.5rem;color:black"></i></a>
                    @if(Auth::user()->hasFavorited($post))
                    <a class="footer-action-icons float-right" href="{{route('unSave-post',$post->id)}}"
                        style="font-size: 1.5rem;color:black"><i class="fas fa-bookmark"></i></a>
                    @else
                    <a class="footer-action-icons float-right" href="{{route('save-post',$post->id)}}"
                        style="font-size: 1.5rem;color:black"><i class="far fa-bookmark"></i></a>
                    @endif

                    @if($post->like_no == 0)
                    <p class="Likes">be the first to Like</p>
                    @else
                    <p class="Likes">{{$post->like_no}} Likes</p>

                    @endif
                    <p><a class="Instagram-card-content-user"
                            href="{{route('profile.view',$post->user->id)}}">{{$post->user->user_name}}
                        </a> | {{$post->caption}}</p>
                    <p>
                        @foreach($post->tags as $postTag)
                        <a class="Instagram-card-content-user" style="color:#00376b"
                            href="{{route('tag-show',$postTag->id)}}">
                            {{$postTag->name}}
                        </a>
                        @endforeach

                    </p>

                    <p class="comments"><a href="{{route('post.show',$post->id)}}">View all
                            {{$post->totalCommentsCount()}} comments</a></p>
                    <hr>
                </div>
                <form action="{{route('comment',$post->id)}}" method="POST">
                    @csrf
                    <div class="Instagram-card-footer">
                        <input class="comments-input" name="comment" id="comment" type="text"
                            placeholder="Add a comment..." />
                        <input type="submit" class="btn btn-outline-secondary" value="Post">
                    </div>
                </form>


            </div>
            @endforeach
            <div class="loader mt-2"></div>
        </div>
    </div>
</div>
@endsection
