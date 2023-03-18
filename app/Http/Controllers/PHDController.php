<?php

namespace App\Http\Controllers;

use App\Models\Phd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PHDController extends Controller
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
        return view('faculty.edubg.phd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phdInfo = $request->validate([
            'school' => 'required',
            'course' => 'required',
            'graduation_date' => 'required',
            'diploma' => 'required',
            'research' => 'required',
        ]);
        
        $phdInfo['status'] = 'pending';
        $phdInfo['user_id'] = auth()->user()->id;

        if($request->hasFile('diploma')){
            $phdInfo['diploma'] = $request->file('diploma')->store('images', 'public');
        }

        if($request->hasFile('research')){
            $phdInfo['research'] = $request->file('research')->store('images', 'public');
        }
   
        Phd::create($phdInfo);

        return redirect(route('edubg'))->with('message', 'PHD Information Successfully Added');
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
    public function edit(Phd $phd)
    {
        return view('faculty.edubg.phd.edit', [
            'phd' => $phd,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phd $phd)
    {
        $phdInfo = $request->validate([
            'school' => 'required',
            'course' => 'required',
            'graduation_date' => 'required',
            'diploma' => 'required',
            'research' => 'required',
        ]);

        if($request->hasFile('diploma')){
            $phdInfo['diploma'] = $request->file('diploma')->store('images', 'public');
        }

        if($request->hasFile('research')){
            $phdInfo['research'] = $request->file('research')->store('images', 'public');
        }
   
        $phd->update($phdInfo);

        return redirect(route('edubg'))->with('message', 'PHD Information Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phd $phd)
    {

        if (File::exists(public_path('uploads/' . $phd->diploma))) {
            File::delete(public_path('uploads/' . $phd->diploma));
        }

        if (File::exists(public_path('uploads/' . $phd->research))) {
            File::delete(public_path('uploads/' . $phd->research));
        }

        $phd->delete();

        return redirect(route('edubg'))->with('message', 'PHD Information Successfully Deleted');
    }
}
