<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OCESController extends Controller
{
    public function index()
    {
        return view('evaluate.oces.index');
    }
}
