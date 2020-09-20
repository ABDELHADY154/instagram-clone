<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $users = $user->followings;
        $idArr = [];
        $idArr[] = $user->id;
        foreach ($users as $following) {
            $idArr[] = $following->id;
        }
        $posts = Post::orderBy('created_at', 'desc')->whereIn('user_id',  $idArr)->get();

        return view('home', ['posts' => $posts]);
    }

    public function search()
    {
        $users = User::all();
        return view('layouts.search', ['users' => $users]);
    }
}
