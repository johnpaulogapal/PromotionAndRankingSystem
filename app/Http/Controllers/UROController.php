<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use App\Models\Application;
use Illuminate\Http\Request;

class UROController extends Controller
{
    public function index()
    {
        return view('evaluate.uro.index', [
            'approvedApplications' => Application::where('app_status', 'approved')->get()
        ]);
    }

    public function show(User $user)
    {
        return view('evaluate.uro.show', [
            'user' => $user
        ]);
    }

    public function scoreUpdate(Request $request, User $user, Score $score)
    {
        
    
        $scoreInfo = $request->validate([
            'research' => 'required',
            'research_min' => '',
        ]);
      

        if(!empty($score->edu_attain) && !empty($score->com_ser)){
            $scoreInfo['status'] = 'approved';
            Application::where('user_id', $user->id)->update([
                'app_status' => 'completed',
                // Additional columns and values to update
            ]);
        }
            
        $score->update($scoreInfo);

        return redirect()->route('uro.index')->with('message', $user->first_name . ' ' . $user->last_name . ' Evaluation Score Information Successfully Updated');
    }

}
