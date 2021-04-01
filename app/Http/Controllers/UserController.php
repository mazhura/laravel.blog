<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'name' => 'required',
            'email' => 'required|email:filter|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Successfully registered and authorized!');
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
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'You are logged!');
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index')->with('success', 'Welcome to index panel!');
            } else {
                session()->flash('warning', 'You are not admin');
                return redirect()->route('welcome');
            }


        } else {
            return redirect()->back()->with('error', 'Incorrect login or password!');
        }


    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
