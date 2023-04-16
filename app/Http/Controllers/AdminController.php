<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index', [
            'pendingCount' => Application::where('app_status' , 'pending')->get()->count(),
            'ongoingCount' => Application::where('app_status' , 'received')->get()->count(),
            'approvedCount' => Application::where('app_status' , 'approved')->get()->count(),
            'userCount' => User::All()->count(),
            'weekApplications' => Application::where('app_status', 'pending')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get(),
        ]);
    }

    public function account(){
        return view('admin.account', [
            'accounts' => User::all(),
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

    public function accountDestroy(User $user)
    {

        $user->delete();

        return redirect()->route('admin.account')->with('message', 'User ' . $user->first_name . ' ' . $user->last_name .' Successfully Deleted');
    }

    public function score(User $user)
    {
        return view('admin.score', [
            'user' => $user,
        ]);
    }

    public function scoreStore(Request $request, User $user)
    {

        if($user->user_type == 'basicEd'){
            $userInfo = $request->validate([
                'edu_attain' => 'required',
                'teach_eval' => 'required',
                'prof_exam' => 'required',
            ]);
        }
        else{
            $userInfo = $request->validate([
                'edu_attain' => 'required',
                'teach_eval' => 'required',
                'masters' => 'required',
                'teach_eval_min' => 'required',
            ]);
        }
        
        $userInfo['user_id'] = $user->id;
        
        Score::create($userInfo);

        return redirect()->route('admin.score', $user->id)->with('message', $user->first_name . ' ' . $user->last_name . ' Evaluation Score Information Successfully Added');
    }

    public function scoreEdit(User $user)
    {
        return view('admin.scoreEdit', [
            'user' => $user,
        ]);
    }

    public function scoreUpdate(Request $request, User $user, Score $score)
    {
       
        
        
        if($user->user_type == 'basicEd'){
            $scoreInfo = $request->validate([
                'edu_attain' => 'required',
                'teach_eval' => 'required',
                'prof_exam' => 'required',
                'train_sem' => 'required',
                'mpo' => 'required',
            ]);
        }
        else{
            $scoreInfo = $request->validate([
                'edu_attain' => 'required',
                'teach_eval' => 'required',
                'train_sem' => 'required',
                'mpo' => 'required',
                'masters' => 'required',
                'teach_eval_min' => 'required',
            ]);
        }

        if(!empty($score->research) && !empty($score->mpo)){
            $scoreInfo['status'] = 'approved';
            Application::where('user_id', $user->id)->update([
                'app_status' => 'completed',
                // Additional columns and values to update
            ]);
        }
        
        
        $score->update($scoreInfo);

        return redirect()->route('admin.score', $user->id)->with('message', $user->first_name . ' ' . $user->last_name . ' Evaluation Score Information Successfully Updated');
    }


    public function basicEd(){
        return view('admin.ranking.basicEd', [
            'users' => User::where('user_type', 'basicEd')->where('status', 'verified')->get(),
        ]);
    }

    public function basicEdShow(User $user)
    {
        return view('admin.ranking.basicEdShow', [
            'user' => $user,
        ]);
    }

    public function college(){
        return view('admin.ranking.college', [
            'users' => User::where('user_type', 'college')->where('status', 'verified')->get(),
        ]);
    }

    public function collegeShow(User $user)
    {
        return view('admin.ranking.collegeShow', [
            'user' => $user,
        ]);
    }

}
