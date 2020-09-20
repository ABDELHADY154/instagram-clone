<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment' => ['required', 'string', 'max:500']
        ]);
        $userID = Auth::user()->id;
        $user = User::find($userID);
        $post = Post::find($id);
        $user->comment($post, $request->comment);
        $post->comment_no = $post->totalCommentsCount();
        $post->save();
        return redirect(route('post.show', $post->id));
    }
}
