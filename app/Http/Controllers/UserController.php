<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Master;
use App\Models\Undergrad;
use App\Models\Application;
use App\Models\Mpo;
use App\Models\Phd;
use App\Models\Prc;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index(){
        return view('faculty.profile.index', [

            'totalUserProcessing' => User::where('id', auth()->user()->id)->where('status', 'processing')->get()->count(),
            'totalApplicationProcessing' => Application::where('user_id', auth()->user()->id)->where('status', 'processing')->get()->count(),
            'totalUndergradProcessing' => Undergrad::where('user_id', auth()->user()->id)->where('status', 'processing')->get()->count(),
            'totalMasterProcessing' => Master::where('user_id', auth()->user()->id)->where('status', 'processing')->get()->count(),
            'totalPhdProcessing' => Phd::where('user_id', auth()->user()->id)->where('status', 'processing')->get()->count(),
            'totalPrcProcessing' => Prc::where('user_id', auth()->user()->id)->where('status', 'processing')->get()->count(),
            'totalMpoProcessing' => Mpo::where('user_id', auth()->user()->id)->where('status', 'processing')->get()->count(),
            'totalTrainingProcessing' => Training::where('user_id', auth()->user()->id)->where('status', 'processing')->get()->count(),


            'totalUserResubmit' => User::where('id', auth()->user()->id)->where('status', 'resubmit')->get()->count(),
            'totalApplicationResubmit' => Application::where('user_id', auth()->user()->id)->where('status', 'resubmit')->get()->count(),
            'totalUndergradResubmit' => Undergrad::where('user_id', auth()->user()->id)->where('status', 'resubmit')->get()->count(),
            'totalMasterResubmit' => Master::where('user_id', auth()->user()->id)->where('status', 'resubmit')->get()->count(),
            'totalPhdResubmit' => Phd::where('user_id', auth()->user()->id)->where('status', 'resubmit')->get()->count(),
            'totalPrcResubmit' => Prc::where('user_id', auth()->user()->id)->where('status', 'resubmit')->get()->count(),
            'totalMpoResubmit' => Mpo::where('user_id', auth()->user()->id)->where('status', 'resubmit')->get()->count(),
            'totalTrainingResubmit' => Training::where('user_id', auth()->user()->id)->where('status', 'resubmit')->get()->count(),

            'totalUserVerified' => User::where('id', auth()->user()->id)->where('status', 'verified')->get()->count(),
            'totalApplicationVerified' => Application::where('user_id', auth()->user()->id)->where('status', 'verified')->get()->count(),
            'totalUndergradVerified' => Undergrad::where('user_id', auth()->user()->id)->where('status', 'verified')->get()->count(),
            'totalMasterVerified' => Master::where('user_id', auth()->user()->id)->where('status', 'verified')->get()->count(),
            'totalPhdVerified' => Phd::where('user_id', auth()->user()->id)->where('status', 'verified')->get()->count(),
            'totalPrcVerified' => Prc::where('user_id', auth()->user()->id)->where('status', 'verified')->get()->count(),
            'totalMpoVerified' => Mpo::where('user_id', auth()->user()->id)->where('status', 'verified')->get()->count(),
            'totalTrainingVerified' => Training::where('user_id', auth()->user()->id)->where('status', 'verified')->get()->count(),
        ]);
    }

    public function edubg(){
        return view('faculty/edubg/index');
    }

    public function create()
    {
            return view('faculty.profile.create');
    }

    public function store(Request $request, User $user)
    {
        
       $request->validate([
            'emp_num' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'sex' => 'required',
            'department' => 'required',
            'faculty' => 'required',
            'avatar' => ['required', 'mimes:jpg,jpeg,png', 'max:2048'],
            'date_hired' => 'required',
            'current_rank' => 'required',
            'date_last_prom' => 'required',
            'proposed_rank' => 'required',
        ]);

        // ALL APPLICATION RELATED
        $appInfo = $request->validate([
            'date_hired' => 'required',
            'current_rank' => 'required',
            'date_last_prom' => 'required',
            'proposed_rank' => 'required',
        ]);

        $appInfo['app_status'] = 'pending';
        $appInfo['status'] = 'pending';
        $appInfo['user_id'] = auth()->user()->id;

        Application::create($appInfo);

        // ALL USER RELATED
        $userInfo = $request->validate([
            'emp_num' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'sex' => 'required',
            'department' => 'required',
            'faculty' => 'required',
            'avatar' => 'required',
        ]);

        $userInfo['age'] = $this->getAge($request->birth_date);
        $userInfo['status'] = 'pending';
        
        if($request->hasFile('avatar')){
            $userInfo['avatar'] = $request->file('avatar')->store('images', 'public');
        }

        $user->update($userInfo);

        return redirect('/')->with('message', 'Welcome to our Ranking and Promotion Portal. Please Submit the Needed Information');
    }

    public function edit(User $user)
    {
            return view('faculty.profile.edit', [
                'user' => $user,
                'application' => $user->application
            ]);
    }

    public function update(Request $request, User $user, Application $application)
    {

        $request->validate([
            'emp_num' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'sex' => 'required',
            'department' => 'required',
            'faculty' => 'required',
            'avatar' => ['mimes:jpg,jpeg,png', 'max:2048'],
            'date_hired' => 'required',
            'current_rank' => 'required',
            'date_last_prom' => 'required',
            'proposed_rank' => 'required',
        ]);

        $userInfo = $request->validate([
            'emp_num' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'sex' => 'required',
            'department' => 'required',
            'faculty' => 'required',
        ]);

        $userInfo['status'] = 'pending';
        $userInfo['age'] = $this->getAge($request->birth_date);

        if($request->hasFile('avatar')){
            $userInfo['avatar'] = $request->file('avatar')->store('images', 'public');
        }

        $user->update($userInfo);

        $appInfo = $request->validate([
            'date_hired' => 'required',
            'current_rank' => 'required',
            'date_last_prom' => 'required',
            'proposed_rank' => 'required',
        ]);

        $appInfo['status'] = 'pending';

        $application->update($appInfo);

        return redirect()->route('profile.show', auth()->user()->id)->with('message', 'Your Personal and Application Information Successfully Updated');
    }

    public function show(User $user)
    {
            return view('faculty.profile.show', [
                'user' => $user,
                'application' => $user->application
            ]);
    }

    // Functions
    public function getAge($date) 
    {

        $age = Carbon::parse($date)->age;
        
        return $age;
    }
}
