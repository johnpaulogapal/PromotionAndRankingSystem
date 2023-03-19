<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApprovedController extends Controller
{
    public function index() {
        return view('admin.approved.index', [
            'approvedApplications' => Application::where('app_status', 'approved')->get()
        ]);
    }
}
