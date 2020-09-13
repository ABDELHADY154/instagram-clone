<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
}
