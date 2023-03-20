<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You are now Signed out');
    }

    public function authenticate(Request $request)
    {
       
        
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            if(auth()->user()->first_name == '')
                return redirect()->route('profile.create')->with('message', 'You may now pass the needed requirements. Thank you');
            else
                return redirect('/')->with('message', 'You are now Signed as');
        }
        else {
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }

    }

    public function privacy()
    {
        return view('auth/privacy');
    }
}
