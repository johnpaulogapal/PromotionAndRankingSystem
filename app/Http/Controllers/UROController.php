<?php

namespace App\Http\Controllers;

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
}
