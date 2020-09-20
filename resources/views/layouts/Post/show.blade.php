@extends('layouts.app')

@section('title','Post')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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


                    <a class="footer-action-icons" href="#comment"><i class="far fa-comment"
                            style="font-size: 1.5rem;color:black"></i></a>
                    @if(Auth::user()->hasFavorited($post))
                    <a class="footer-action-icons float-right" href="{{route('unSave-post',$post->id)}}"
                        style="font-size: 1.5rem;color:black"><i class="fas fa-bookmark"></i></a>
                    @else
                    <a class="footer-action-icons float-right" href="{{route('save-post',$post->id)}}"
                        style="font-size: 1.5rem;color:black"><i class="far fa-bookmark"></i></a>
                    @endif


                    <p class="Likes">{{$post->like_no}} Likes</p>
                    <p><a class="Instagram-card-content-user"
                            href="{{route('profile.view',$post->user->id)}}">{{$post->user->user_name}}
                        </a> | {{$post->caption}}</p>
                    <p>
                        @foreach($post->tagNames() as $postTag)
                        <a class="Instagram-card-content-user" href="#">
                            {{$postTag}}
                        </a>
                        @endforeach

                    </p>

                    <p class="comments"><a href="{{route('post.show',$post->id)}}">View all
                            {{$post->totalCommentsCount()}} comments</a></p>
                    <hr>
                    <ul class="list-group list-group-flush">
                        @foreach($post->comments as $comment)
                        <li class="list-group-item">

                            <div class="row">
                                <img src=" {{asset('storage/images/avatars/'. $comment->commented->avatar) }}"
                                    class="Instagram-card-user-image d-inline">
                                <p class="mt-2">
                                    <a class="Instagram-card-user-name"
                                        href="{{route('profile.view',$comment->commented->id)}}">{{$comment->commented->user_name}}
                                    </a> | {{$comment->comment}}

                                </p>

                            </div>
                            <p class="text-right font-italic font-weight-lighter" style="font-size:0.8rem">
                                {{$comment->created_at}}</p>

                        </li>

                        @endforeach
                    </ul>
                </div>
                <form action="{{route('comment',$post->id)}}" method="POST">
                    @csrf
                    <div class="Instagram-card-footer">
                        <input class="comments-input" name="comment" id="comment" type="text"
                            placeholder="Add a comment..." />
                        <input type="submit" class="btn btn-outline-secondary" value="Post">
                    </div>
                </form>

                {{-- <div class="Instagram-card-content">
                    @if(Auth::user()->hasLiked($post))
                    <a class="footer-action-icons mr-2" href="{{route('unlike',$post->id)}}"
                style="font-size: 1.5rem; color:#ed4956">
                <i class="fas fa-heart"></i></a>
                @else
                <a class="footer-action-icons mr-2" href="{{route('like',$post->id)}}"
                    style="font-size: 1.5rem ;color:black"><i class="fa fa-heart-o"></i></a>
                @endif


                <a class="footer-action-icons" href="#"><i class="far fa-comment"
                        style="font-size: 1.5rem;color:black"></i></a>
                @if(Auth::user()->hasFavorited($post))
                <a class="footer-action-icons float-right" href="{{route('unSave-post',$post->id)}}"
                    style="font-size: 1.5rem;color:black"><i class="fas fa-bookmark"></i></a>
                @else
                <a class="footer-action-icons float-right" href="{{route('save-post',$post->id)}}"
                    style="font-size: 1.5rem;color:black"><i class="far fa-bookmark"></i></a>
                @endif


                <p class="Likes">{{$post->like_no}} Likes</p>
                <p><a class="Instagram-card-content-user"
                        href="{{route('profile.view',$post->user->id)}}">{{$post->user->user_name}}
                    </a> | {{$post->caption}}</p>
                <p>
                    @foreach($post->tagNames() as $postTag)
                    <a class="Instagram-card-content-user" href="#">
                        {{$postTag}}
                    </a>
                    @endforeach

                </p>

                <p class="comments">View all {{$post->comment_no}} comments</p>
                <hr>
            </div> --}}
            {{-- <div class="Instagram-card-content">
                    <a class="footer-action-icons mr-2" href="#" style="font-size: 1.5rem"><i
                            class="fa fa-heart-o"></i></a>
                    <a class="footer-action-icons" href="#"><i class="far fa-comment" style="font-size: 1.5rem"></i></a>
                    @if(Auth::user()->hasFavorited($post))
                    <a class="footer-action-icons float-right" href="{{route('unSave-post',$post->id)}}"
            style="font-size: 1.5rem"><i class="fas fa-bookmark"></i></a>
            @else
            <a class="footer-action-icons float-right" href="{{route('save-post',$post->id)}}"
                style="font-size: 1.5rem"><i class="far fa-bookmark"></i></a>
            @endif


            <p class="Likes">{{$post->like_no}} Likes</p>
            <p><a class="Instagram-card-content-user"
                    href="https://www.instagram.com/rogersbase/">{{$post->user->user_name}}
                </a> | {{$post->caption}}</p>
            <p class="comments">View all {{$post->comment_no}} comments</p>
            <hr>
        </div> --}}
        {{--
        <div class="Instagram-card-footer">
            <a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
            <input class="comments-input" type="text" placeholder="Add a comment..." />
            <a class="footer-action-icons" href="#"><i class="fa fa-ellipsis-h"></i></a>
        </div> --}}
    </div>
</div>
</div>
</div>

@endsection
