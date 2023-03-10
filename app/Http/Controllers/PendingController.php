<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    
    public function index(){
        return view('admin.pending.index', [
            'pendingApplications' => Application::where('status', 'pending')->get(),
        ]);
    }
}
