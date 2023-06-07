<?php

namespace App\Http\Controllers;

use App\MyUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(auth()->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('dashboard.home');
        }

        return redirect()->route('login')->withErrors(['credentials'=>'Invalid Credentials']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with(['message'=>'Successfully created']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with(['message'=>'Logged out']);
    }
}
