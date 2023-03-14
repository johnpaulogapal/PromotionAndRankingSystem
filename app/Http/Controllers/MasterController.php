<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
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
        return view('faculty.edubg.master.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masterInfo = $request->validate([
            'school' => 'required',
            'course' => 'required',
            'graduation_date' => 'required',
            'diploma' => 'required',
            'research' => 'required',
        ]);
        
        $masterInfo['status'] = 'pending';
        $masterInfo['user_id'] = auth()->user()->id;

        if($request->hasFile('diploma')){
            $masterInfo['diploma'] = $request->file('diploma')->store('images', 'public');
        }

        if($request->hasFile('research')){
            $masterInfo['research'] = $request->file('research')->store('images', 'public');
        }
   
        Master::create($masterInfo);

        return redirect(route('edubg'))->with('message', 'Masters Information Successfully Added');
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
    public function edit(Master $master)
    {
        return view('faculty.edubg.master.edit', [
            'master' => $master,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
        $masterInfo = $request->validate([
            'school' => 'required',
            'course' => 'required',
            'graduation_date' => 'required',
            'diploma' => 'required',
            'research' => 'required',
        ]);

        if($request->hasFile('diploma')){
            $masterInfo['diploma'] = $request->file('diploma')->store('images', 'public');
        }

        if($request->hasFile('research')){
            $masterInfo['research'] = $request->file('research')->store('images', 'public');
        }
   
        $master->update($masterInfo);

        return redirect(route('edubg'))->with('message', 'Masters Information Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        $master->delete();

        return redirect(route('edubg'))->with('message', 'Masters Information Successfully Deleted');
    }
}
