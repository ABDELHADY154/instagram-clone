<?php

namespace App\Http\Controllers;

use App\User;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $user = \Auth::user()->find($id);

        return view('layouts.User.index', [
            'user' => $user
        ]);
    }


    public function edit()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        return view('layouts.User.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'name' => ['required', 'string'],
            'user_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'website' => 'nullable|string',
            'phone_number' => 'required|integer',
            'gender' => 'required|string|max:6',
            'bio' => 'nullable|string|max:200',
            // 'image' => ['regex:/(\d)+.(?:jpe?g|png|gif)/'],

        ]);

        //Update image if new one provided
        if (null !== $request->image) {
            // $imageName = time() . '.' . $request->image;

            // // $request->image->move(public_path('images') . '/avatar/', $imageName);

            // $user->image = $imageName;
            // $image_path = $request->image;
            // $image_path_name = time() . $image_path;
            // dd($image_path_name);
            // Storage::putFile('avatars', $image_path_name);
            // Storage::disk('users')->put($image_path_name, File::get($image_path));
            // $user->image = $image_path_name;
        } else {
            $user->image = 'default.png';
        }
        $user->image = 'default.png';
        strlen($request->name) > 0 ? $user->name = $request->name : '';
        strlen($request->bio) > 0 ? $user->bio = $request->bio : '';
        strlen($request->user_name) > 0 ? $user->user_name = $request->user_name : '';
        strlen($request->email) > 0 ? $user->email = $request->email : '';
        strlen($request->phone_number) > 0 ? $user->phone_number = $request->phone_number : '';
        strlen($request->gender) > 0 ? $user->gender = $request->gender : '';
        strlen($request->website) > 0 ? $user->website = $request->website : '';

        $user->save();
        // dd($user);
        return redirect(route('profile'));
        // dd($request->all());
        // return view('layouts.User.index');
    }
}
