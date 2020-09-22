<?php

namespace App\Http\Controllers;

use App\Post;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($id)
    {
        $tag = Tag::where('id', $id)->get();

        $posts = Post::withAnyTag([$tag[0]->name])->get();
        return view('layouts.tag', [
            'tag' => $tag, 'posts' => $posts
        ]);
    }
}
