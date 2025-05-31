<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showLogin(){
        return view('backend.user.login');
    }

    function showRegister(){
        return view('backend.user.register');
    }

    function register(RegisterRequest $request){
        try{
            $user = User::create($request->all());
            if($user){
                return redirect()->route('backend.showlogin')->with('success','User registered succssfully');
            } else {
                return redirect()->back()->with('error','User registration failed');
            }
        }catch(Exception $ex){
                return redirect()->back()->with('error','Oops... Error');
        }
    }

    
    function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }
}