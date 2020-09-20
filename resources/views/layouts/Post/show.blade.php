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
                    <img src="{{ asset('images/posts/'. $post->image) }}" class="gallery-image"
                        style="max-height: 30rem" />
                </div>
                <div class="Instagram-card-content">
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
                </div>

                <div class="Instagram-card-footer">
                    <a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
                    <input class="comments-input" type="text" placeholder="Add a comment..." />
                    <a class="footer-action-icons" href="#"><i class="fa fa-ellipsis-h"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
