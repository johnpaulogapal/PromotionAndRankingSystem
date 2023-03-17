<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    
    public function index(){
        return view('admin.pending.index', [
            'pendingApplications' => Application::where('received', 0)->get(),
        ]);
    }

    public function receive(Application $application){
        
        $pendingInfo['received'] = 1;
        $application->update($pendingInfo);

        return redirect()->route('received.index')->with('message', 'Application Received Successfully');
    }
}
