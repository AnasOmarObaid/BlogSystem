<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function create()
    {
        return view('auth.register.create');
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'username'  =>  'required|string|unique:users,username|max:15',
            'full_name' =>  'required|string|max:20',
            'email'     =>  'required|email|unique:users,email|max:50',
            'password'  =>  'required|confirmed|max:20',
        ]);
        $user = User::create($validate);
        Auth::login($user);
        return redirect()->route('post.index')->with('success', 'successfully register, welcome to our website');
    }
}
