<?php

namespace App\Http\Controllers;

use App\Http\Requests\editProfileRequest;
use App\Post;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->get();

        return view('layouts.User.index', [
            'posts' => $posts,  'user' => $user,
        ]);
    }


    public function edit()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        return view('layouts.User.edit', ['user' => $user]);
    }

    public function update(editProfileRequest $request)
    {
        $user = User::find(Auth::id());

        if ($request->file('avatar')) {

            $imgName = $request->file('avatar')->hashName();
            $path = $request->file('avatar')->storeAs(
                'public/images/avatars',
                $imgName
            );
            $user->avatar = $imgName;
        }

        strlen($request->name) > 0 ? $user->name = $request->name : '';
        strlen($request->bio) > 0 ? $user->bio = $request->bio : '';
        strlen($request->user_name) > 0 ? $user->user_name = $request->user_name : '';
        strlen($request->email) > 0 ? $user->email = $request->email : '';
        strlen($request->phone_number) > 0 ? $user->phone_number = $request->phone_number : '';
        strlen($request->gender) > 0 ? $user->gender = $request->gender : '';
        strlen($request->website) > 0 ? $user->website = $request->website : '';

        $user->save();
        return redirect(route('profile'));
    }

    public function setting()
    {
        return view('layouts.User.setting');
    }
    public function disable()
    {
        // User::withTrashed()->find($post_id)->restore(); //restore soft delete
        $id = auth()->user()->id;
        $user = User::find($id);
        $user->delete();
        return redirect(route('home'));
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();
        return redirect(route('profile'));
    }

    public function profileView($id)
    {
        // $id = auth()->user()->id;
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->get();

        return view('layouts.User.index', [
            'posts' => $posts,  'user' => $user,
        ]);
    }
}
