<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrainingController extends Controller
{
    
    public function index()
    {
        return view('faculty.training.index');
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
            'certificate' => ['required', 'mimes:jpg, jpeg, png', 'max:2048'],
        ]);

        $trainingInfo['status'] = 'pending';
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
            'certificate' => ['mimes:jpg, jpeg, png', 'max:2048'],
        ]);
        
        $trainingInfo['status'] = 'pending';

        $training->update($trainingInfo);

        return redirect()->route('training.index')->with('message', 'Trainings/Seminars/Webinars Information Successfully Updated');
    }

    public function destroy(Training $training)
    {

        if (File::exists(public_path('uploads/' . $training->certificate))) {
            File::delete(public_path('uploads/' . $training->certificate));
        }

        $training->delete();

        return redirect(route('training.index'))->with('message', 'Trainings/Seminars/Webinars Information Successfully Deleted');
    }
}
