<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
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

    public function score(User $user){
        return view('admin.score', [
            'user' => $user,
        ]);
    }

    public function scoreStore(Request $request, User $user){
        
        $userInfo = $request->validate([
            'edu_attain' => 'required',
            'teach_eval' => 'required',
            'research' => 'required',
            'com_ser' => 'required',
            'train_sem' => 'required',
            'mpo' => 'required',
            'masters' => '',
            'teach_eval_min' => '',
            'research_min' => '',
        ]);

        $userInfo['user_id'] = $user->id;
        
        Score::create($userInfo);

        return redirect()->route('approved.index')->with('message', $user->first_name . ' ' . $user->last_name . ' Evaluation Score Information Successfully Added');
    }

}
