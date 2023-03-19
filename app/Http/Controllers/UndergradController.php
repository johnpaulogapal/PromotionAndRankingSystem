<?php

namespace App\Http\Controllers;

use App\Models\Undergrad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UndergradController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculty.edubg.undergrad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $undergradInfo = $request->validate([
            'school' => 'required',
            'course' => 'required',
            'graduation_date' => 'required',
            'diploma' => ['required', 'mimes:jpg, jpeg, png', 'max:2048'],
            'research' => ['required', 'mimes:zip'],
        ]);
        
        $undergradInfo['status'] = 'pending';
        $undergradInfo['user_id'] = auth()->user()->id;

        if($request->hasFile('diploma')){
            $undergradInfo['diploma'] = $request->file('diploma')->store('images', 'public');
        }

        if($request->hasFile('research')){
            $undergradInfo['research'] = $request->file('research')->store('images', 'public');
        }
   
        Undergrad::create($undergradInfo);

        return redirect(route('edubg'))->with('message', 'Undergrad Information Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Undergrad $undergrad)
    {
        return view('faculty.edubg.undergrad.edit', [
            'undergrad' => $undergrad,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Undergrad $undergrad)
    {
        $undergradInfo = $request->validate([
            'school' => 'required',
            'course' => 'required',
            'graduation_date' => 'required',
            'diploma' => ['mimes:jpg, jpeg, png', 'max:2048'],
            'research' => ['mimes:zip'],
        ]);

        if($request->hasFile('diploma')){
            $undergradInfo['diploma'] = $request->file('diploma')->store('images', 'public');
        }

        if($request->hasFile('research')){
            $undergradInfo['research'] = $request->file('research')->store('images', 'public');
        }
        
        $undergradInfo['status'] = 'pending';
   
        $undergrad->update($undergradInfo);

        return redirect(route('edubg'))->with('message', 'Undergrad Information Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Undergrad $undergrad)
    {
        if (File::exists(public_path('uploads/' . $undergrad->diploma))) {
            File::delete(public_path('uploads/' . $undergrad->diploma));
        }

        if (File::exists(public_path('uploads/' . $undergrad->research))) {
            File::delete(public_path('uploads/' . $undergrad->research));
        }

        $undergrad->delete();

        return redirect(route('edubg'))->with('message', 'Undergrad Information Successfully Deleted');
    }
}
