<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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
            if(auth()->user()->status == '' && (auth()->user()->user_type == 'basicEd' || auth()->user()->user_type == 'college'))
                return redirect()->route('profile.create')->with('message', 'You may now pass the needed requirements. Thank you');
            elseif(auth()->user()->user_type == 'uro')
                return redirect()->route('uro.index')->with('message', 'Welcome URO');
            elseif(auth()->user()->user_type == 'oces')
                return redirect()->route('oces.index')->with('message', 'Welcome URO');
            elseif(auth()->user()->user_type == 'dean')
                return redirect()->route('dean.index')->with('message', 'Welcome URO');
            elseif(auth()->user()->user_type == 'admin')
                return redirect()->route('admin.index')->with('message', 'Welcome URO');
            else
                return redirect('/')->with('message', 'You are now Signed as');
        }
        else {
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }

    }

    public function privacy()
    {
        return view('auth.privacy');
    }

    public function password()
    {
        return view('auth.change');
    }

    public function change(Request $request)
    {
        $user = User::find(auth()->user()->id);

        // Validate the form data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'confirm_password' => 'required|same:new_password'
        ]);

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();


        // Redirect with success message
        return redirect()->back()->with('message', 'Password changed successfully.');
    }
}
