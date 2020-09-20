@extends('layouts.app')

@section('title','Tag')
@section('content')

<div class="container">
    <div class="row text-center justify-content-center">
        <div class="col">

            <h2>{{$tag[0]->name}}</h2>

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


@endsection
