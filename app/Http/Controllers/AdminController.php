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
            'prof_exam' => '',
            'masters' => '',
            'teach_eval_min' => '',
            'research_min' => '',
        ]);

       

        if($user->user_type == 'basicEd'){
            $edu_attain = $request->edu_attain * 0.35;
            $teach_eval = $request->teach_eval * 0.30;
            $research = $request->research * 0.05;
            $com_ser = $request->com_ser * 0.10;
            $train_sem = $request->train_sem * 0.15;
            $mpo = $request->mpo * 0.02;
            $prof_exam = $request->prof_exam * 0.03; 

            $userInfo['total'] = $edu_attain + $teach_eval + $research + $com_ser + $train_sem + $mpo + $prof_exam;
        }
        elseif($user->user_type == 'college'){
            $edu_attain = $request->edu_attain * 0.30;
            $teach_eval = $request->teach_eval * 0.25;
            $research = $request->research * 0.25;
            $com_ser = $request->com_ser * 0.10;
            $train_sem = $request->train_sem * 0.08;
            $mpo = $request->mpo * 0.02;

            $userInfo['total'] = $edu_attain + $teach_eval + $research + $com_ser + $train_sem + $mpo;
        }
       
        $userInfo['user_id'] = $user->id;
        
        Score::create($userInfo);

        return redirect()->route('admin.score', $user->id)->with('message', $user->first_name . ' ' . $user->last_name . ' Evaluation Score Information Successfully Added');
    }

    public function scoreEdit(User $user){
        return view('admin.scoreEdit', [
            'user' => $user,
        ]);
    }

    public function scoreUpdate(Request $request, User $user, Score $score){
        
        $scoreInfo = $request->validate([
            'edu_attain' => 'required',
            'teach_eval' => 'required',
            'research' => 'required',
            'com_ser' => 'required',
            'train_sem' => 'required',
            'mpo' => 'required',
            'prof_exam' => '',
            'masters' => '',
            'teach_eval_min' => '',
            'research_min' => '',
        ]);

        if($user->user_type == 'basicEd'){
            $edu_attain = $request->edu_attain * 0.35;
            $teach_eval = $request->teach_eval * 0.30;
            $research = $request->research * 0.05;
            $com_ser = $request->com_ser * 0.10;
            $train_sem = $request->train_sem * 0.15;
            $mpo = $request->mpo * 0.02;
            $prof_exam = $request->prof_exam * 0.03; 

            $scoreInfo['total'] = $edu_attain + $teach_eval + $research + $com_ser + $train_sem + $mpo + $prof_exam;
        }
        elseif($user->user_type == 'college'){
            $edu_attain = $request->edu_attain * 0.30;
            $teach_eval = $request->teach_eval * 0.25;
            $research = $request->research * 0.25;
            $com_ser = $request->com_ser * 0.10;
            $train_sem = $request->train_sem * 0.08;
            $mpo = $request->mpo * 0.02;

            $scoreInfo['total'] = $edu_attain + $teach_eval + $research + $com_ser + $train_sem + $mpo;
        }
        
        $score->update($scoreInfo);

        return redirect()->route('admin.score', $user->id)->with('message', $user->first_name . ' ' . $user->last_name . ' Evaluation Score Information Successfully Updated');
    }


    public function basicEd(){
        return view('admin.ranking.basicEd', [
            'users' => User::where('user_type', 'basicEd')->where('status', 'verified')->get(),
        ]);
    }

    public function college(){
        return view('admin.ranking.college', [
            'users' => User::where('user_type', 'college')->where('status', 'verified')->get(),
        ]);
    }

}
