<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function account(){
        return view('admin.account', [
            'accounts' => User::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function accountCreate(){
        return view('admin.accountCreate');
    }

    public function accountStore(Request $request){

        $accountInfo = $request->validate([
            'user_type' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed'],
        ]);
        
        // Hash Password
        $accountInfo['password'] = bcrypt($accountInfo['password']);

        User::create($accountInfo);

        return redirect()->route('admin.account')->with('message', 'User Successfully Added');

    }

}
