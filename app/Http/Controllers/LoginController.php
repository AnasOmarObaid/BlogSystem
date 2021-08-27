<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    //show login form 
    public static function create()
    {
        return view('auth.login.create');
    }

    // login
    public function store(Request $request)
    {

        // validate data
        $attributes = $request->validate([
            'username'  =>  'required|min:3|max:55|',
            'password'  =>  'required|min:3|max:55|'
        ]);

        // if the username and password not correct
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' =>  'Oops, the username or email no valid',
            ]);
        }

        session()->regenerate();
        return redirect()->route('post.index')->with('success', 'welcome back ' . auth()->user()->username);
    }
}
