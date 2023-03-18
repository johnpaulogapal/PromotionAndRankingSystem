<?php

namespace App\Http\Controllers;


use App\Models\Prc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PRCController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faculty.prc.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculty.prc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $prcInfo = $request->validate([
            'prc_num' => 'required',
            'validity' => 'required',
            'prc_front' => ['required', 'mimes:jpg, jpeg, png', 'max:2048'],
            'prc_back' => ['required', 'mimes:jpg, jpeg, png', 'max:2048'],
        ]);

        $prcInfo['status'] = 'pending';
        $prcInfo['user_id'] = auth()->user()->id;

        if($request->hasFile('prc_front')){
            $prcInfo['prc_front'] = $request->file('prc_front')->store('images', 'public');
        }

        if($request->hasFile('prc_back')){
            $prcInfo['prc_back'] = $request->file('prc_back')->store('images', 'public');
        }

        Prc::create($prcInfo);

        return redirect()->route('prc.index')->with('message', 'PRC Information Successfully Added');
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
    public function edit(Prc $prc)
    {
        return view('faculty.prc.edit', [
            'prc' => $prc,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prc $prc)
    {
        $prcInfo = $request->validate([
            'prc_num' => 'required',
            'validity' => 'required',
            'prc_front' => ['mimes:jpg, jpeg, png', 'max:2048'],
            'prc_back' => ['mimes:jpg, jpeg, png', 'max:2048'],
        ]);

        if($request->hasFile('prc_front')){
            $prcInfo['prc_front'] = $request->file('prc_front')->store('images', 'public');
        }

        if($request->hasFile('prc_back')){
            $prcInfo['prc_back'] = $request->file('prc_back')->store('images', 'public');
        }

        $prc->update($prcInfo);

        return redirect()->route('prc.index')->with('message', 'PRC Information Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prc $prc)
    {

        if (File::exists(public_path('uploads/' . $prc->prc_front))) {
            File::delete(public_path('uploads/' . $prc->prc_front));
        }

        if (File::exists(public_path('uploads/' . $prc->prc_back))) {
            File::delete(public_path('uploads/' . $prc->prc_back));
        }

        $prc->delete();

        return redirect(route('prc.index'))->with('message', 'Prc Information Successfully Deleted');
    }
}
