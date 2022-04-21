<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    public function register() {
        return view('register');
    }

    public function register_insert(Request $request){

        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4',
        ]);
    
        User::create([
            'name'=>ucwords($request->name),
            'email'=>$request->email,
            'password'=> bcrypt($request->password)
        ]);

        return redirect('/login');
    }

    public function login() {
        return view('login');
    }

    public function login_insert(Request $request){

        $credential = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4',
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back();
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
