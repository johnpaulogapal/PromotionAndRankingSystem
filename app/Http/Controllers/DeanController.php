<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class DeanController extends Controller
{
    public function index()
    {
        return view('evaluate.dean.index', [
            'users' => User::where('status', 'verified')->get(),
        ]);
    }

    public function show(Request $request, User $user)
    {
        return view('evaluate.dean.show', [
            'user' => $user,
        ]);
    }

   
}
