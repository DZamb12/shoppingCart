<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:6|alpha_num|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        //encrypt our password
        $formFields['password'] = bcrypt($formFields['password']);

        //save new user
        $user = User::create($formFields);

        //autologin
        auth()->login($user);

        //go back to home page
        return redirect('/')->with('success', 'Hooray! Welcome to the page ' . $user->name);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Good bye user. Buy again!');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //authenticate form
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials.'])->onlyInput('email');
    }
}