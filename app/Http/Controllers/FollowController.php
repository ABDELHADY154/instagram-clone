<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{


    public function follow($id)
    {
        $user1 = Auth::user();
        $user2 = User::find($id);
        $user1->follow($user2);
        return redirect(route('profile.view', $user2->id));
    }

    public function unfollow($id)
    {
        $user1 = Auth::user();
        $user2 = User::find($id);
        $user1->unfollow($user2);
        return redirect(route('profile.view', $user2->id));
    }

    public function profileFollowers()
    {

        $user = auth()->user();
        $users = $user->followers;
        return view('layouts.User.follow.followersList', [
            'users' => $users,
        ]);
    }

    public function profileFollowing()
    {
        $user = auth()->user();
        $users = $user->followings;
        return view('layouts.User.follow.followingList', [
            'users' => $users,
        ]);
    }

    public function followersList($id)
    {
        $user = User::find($id);
        $users = $user->followers;
        return view('layouts.User.follow.followersList', [
            'users' => $users,
        ]);
    }

    public function followingList($id)
    {
        $user = User::find($id);
        $users = $user->followings;
        return view('layouts.User.follow.followingList', [
            'users' => $users,
        ]);
    }
}
