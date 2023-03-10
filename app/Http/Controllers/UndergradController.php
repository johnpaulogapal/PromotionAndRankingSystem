<?php

namespace App\Http\Controllers;

use App\Models\Undergrad;
use Illuminate\Http\Request;

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
        ]);
        
        $undergradInfo['status'] = 'pending';
        $undergradInfo['user_id'] = auth()->user()->id;
   
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
        ]);
   
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
        $undergrad->delete();

        return redirect(route('edubg'))->with('message', 'Undergrad Information Successfully Deleted');
    }
}
