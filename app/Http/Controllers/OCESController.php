<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use App\Models\Application;
use Illuminate\Http\Request;

class OCESController extends Controller
{
    public function index()
    {
        return view('evaluate.oces.index', [
            'approvedApplications' => Application::where('app_status', 'approved')->get()
        ]);
    }

    public function show(User $user)
    {
        return view('evaluate.oces.show', [
            'user' => $user
        ]);
    }

    public function scoreUpdate(Request $request, User $user, Score $score)
    {

        $scoreInfo = $request->validate([
            'com_ser' => 'required',
        ]);
      

        if(!empty($score->edu_attain) && !empty($score->research)){
            $scoreInfo['status'] = 'approved';
            Application::where('user_id', $user->id)->update([
                'app_status' => 'completed',
                // Additional columns and values to update
            ]);
        }
            
        $score->update($scoreInfo);

        return redirect()->route('admin.score', $user->id)->with('message', $user->first_name . ' ' . $user->last_name . ' Evaluation Score Information Successfully Updated');
    }
}
