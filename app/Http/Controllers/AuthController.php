<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Register User
    public function register(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        // Register
        $user = User::create($fields);

        dd('ok');
        // Login
        Auth::login($user);
        //Register
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        // try to login into users
        if(Auth::attempt($fields, $request->remember)){
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.',
            ]);
        }

        //
    }

    // Logout user
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate user's session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to home
        return redirect('/');
    }
}
