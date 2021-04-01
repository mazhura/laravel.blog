<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success','Successfully registered and authorized!');
        Auth::login($user);

        return redirect()->route('welcome');

    }

    public function loginCreate()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email:filter',
            'password'=>'required',
        ]);

        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]))
        {
            session()->flash('success','Authorized!');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
