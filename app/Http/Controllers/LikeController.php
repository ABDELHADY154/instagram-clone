<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{


    public function like($id)
    {
        $user = Auth::user();
        $post = Post::find($id);
        $user->like($post);
        $post->like_no = $post->likes()->count();
        $post->save();
        // dd($post->like_no);

        return Redirect::back();
    }

    public function unlike($id)
    {
        $user = Auth::user();
        $post = Post::find($id);
        $user->unlike($post);
        $post->like_no = $post->likes()->count();
        $post->save();
        // dd($post->like_no);

        return Redirect::back();
    }
}
