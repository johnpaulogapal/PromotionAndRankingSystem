<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    
    public function index()
    {
        return view('faculty.training.index', [
            'trainings' => auth()->user()->trainings,
        ]);
    }

    public function create()
    {
        return view('faculty.training.create');
    }

    public function store(Request $request)
    {
    
        $trainingInfo = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'venue' => 'required',
            'institution' => 'required',
        ]);

        $trainingInfo['user_id'] = auth()->user()->id;

        Training::create($trainingInfo);

        return redirect()->route('training.index')->with('message', 'Trainings/Seminars/Webinars Information Successfully Added');
    }

    public function edit(Training $training)
    {
        return view('faculty.training.edit', [
            'training' => $training,
        ]);
    }

    public function update(Request $request, Training $training)
    {
        $trainingInfo = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'venue' => 'required',
            'institution' => 'required',
        ]);

        $trainingInfo['user_id'] = auth()->user()->id;

        $training->update($trainingInfo);

        return redirect()->route('training.index')->with('message', 'Trainings/Seminars/Webinars Information Successfully Updated');
    }
}
