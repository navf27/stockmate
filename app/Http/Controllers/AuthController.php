<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class AuthController extends Controller
{
    // Register view
    public function registerView(){
        return view('auth.register');
    }

    // Register store
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:45',
            'username' => 'required|max:20|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        Mail::to($validated['email'])->send(new WelcomeMail());

        return redirect('/login')->with('registered', 'User Registered!');
    }

    // Login view
    public function loginView(){
        return view('auth.login');
    }

    // Login auth
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required|max:20',
            'password' => 'required|min:5'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginFail', 'Login Failed!');
    }

    // Logout
    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
