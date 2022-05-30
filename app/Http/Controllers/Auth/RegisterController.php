<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:16|max:255|confirmed',
        ]);

        $user = User::create($credentials); // Password is being hashed in user model

        auth()->login($user);

        return redirect('lists')->with('success', 'Your account has been created.');
    }
}
