<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'tor' => ['required', 'mimes:jpg, jpeg, png', 'max:2048'],
        ]);
        
        $masterInfo['status'] = 'pending';
        $masterInfo['user_id'] = auth()->user()->id;

        if($request->hasFile('tor')){
            $masterInfo['tor'] = $request->file('tor')->store('images', 'public');
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
            'tor' => ['mimes:jpg, jpeg, png', 'max:2048'],
        ]);

        if($request->hasFile('tor')){
            $masterInfo['tor'] = $request->file('tor')->store('images', 'public');
        }

        $masterInfo['status'] = 'pending';
   
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

        if (File::exists(public_path('uploads/' . $master->tor))) {
            File::delete(public_path('uploads/' . $master->tor));
        }

        
        $master->delete();

        return redirect(route('edubg'))->with('message', 'Masters Information Successfully Deleted');
    }
}
