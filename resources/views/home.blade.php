@extends('layouts.app')

@section('title','Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card mt-3">
                <div class="card-header bg-white">
                    <img src=" {{ asset('images/avatar/'. $post->user->image) }}"
                        class="Instagram-card-user-image d-inline">
                    <a class="Instagram-card-user-name"
                        href="{{route('profile.view',$post->user->id)}}">{{$post->user->user_name}}</a>

                </div>
                <div class="Instagram-card-image">
                    <img src="{{ asset('images/posts/'. $post->image) }}" class="gallery-image"
                        style="max-height: 30rem" />
                </div>
                <div class="Instagram-card-content">
                    <a class="footer-action-icons mr-2" href="#"><i class="fa fa-heart-o"></i></a>
                    <a class="footer-action-icons" href="#"><i class="far fa-comment"></i></a>
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
            @endforeach

            {{-- <div class="loader mt-2"></div> --}}

        </div>
    </div>
</div>

@endsection
{{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    {{ __('You are logged in!') }}
</div>
</div> --}}
{{-- I GOT TO PLAY NINTENDO SWITCH
                    ON #NINTENDO MINUTE! 😱 So happy that I can finally talk about this! @kitellis and
                    @breath0air told me that we were going to be playing <a class="hashtag"
                        href="https://www.instagram.com/explore/tags/poochy/">#Poochy
                    </a> and <a class="hashtag" href="https://www.instagram.com/explore/tags/yoshi/">#Yoshi</a> but
                    ended up surprising me with a private <a class="hashtag"
                        href="https://www.instagram.com/explore/tags/nintendoswitch/">#NintendoSwitch</a> play
                    session. I had the opportunity to play The Legend of <a class="hashtag"
                        href="https://www.instagram.com/explore/tags/zelda/">#Zelda</a> <a class="hashtag"
                        href="https://www.instagram.com/explore/tags/breathofthewild/">#BreathOfTheWild</a> and <a
                        class="hashtag" href="https://www.instagram.com/explore/tags/12switch/">#12Switch</a>, both
                    of which were a ton of fun! Massive thank you to the team at @Nintendo for having me on! I had
                    an absolute blast! 🎉 --}}
{{-- <p class="comments">View all {{$post->comment_no}} comments</p>
<br><a class="user-comment" href="https://www.instagram.com/chrisobrien64/">chrisobrien64</a> NO
WAY! WAY TO GO ROGER MY BOI</br>
<br><a class="user-comment" href="https://www.instagram.com/artie_mcparty/">artie_mcparty</a> ROGER
= BEST NINTENDO FAN.<br>
<br><a class="user-comment" href="https://www.instagram.com/theealeexj/">theealeexj</a> I JUST TRIED
IT OUT TODAY ITS AMAZING<br> --}}
