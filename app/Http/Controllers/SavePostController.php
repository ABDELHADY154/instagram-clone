<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SavePostController extends Controller
{
    public function savePost($id)
    {
        $user = Auth::user();
        $post = Post::find($id);

        $user->favorite($post);
        return Redirect::back();
    }

    public function unSavePost($id)
    {
        $user = Auth::user();
        $post = Post::find($id);

        $user->unfavorite($post);
        return Redirect::back();
    }
}
