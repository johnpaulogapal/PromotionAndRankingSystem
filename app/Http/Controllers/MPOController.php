<?php

namespace App\Http\Controllers;

use App\Models\Mpo;
use Illuminate\Http\Request;

class MPOController extends Controller
{
    public function index()
    {
        return view('faculty.mpo.index');
    }

    public function create()
    {
        return view('faculty.mpo.create');
    }

    public function store(Request $request)
    {
    
        $mpoInfo = $request->validate([
            'org_name' => 'required',
            'validity' => 'required',
            'certificate' => ['required', 'mimes:jpg, jpeg, png', 'max:2048'],
        ]);

        $mpoInfo['status'] = 'pending';
        $mpoInfo['user_id'] = auth()->user()->id;

        Mpo::create($mpoInfo);

        return redirect()->route('mpo.index')->with('message', 'Membership In Professional Organization Information Successfully Added');
    }

    public function edit(Mpo $mpo)
    {
        return view('faculty.mpo.edit', [
            'mpo' => $mpo,
        ]);
    }

    public function update(Request $request, Mpo $mpo)
    {
        
        $mpoInfo = $request->validate([
            'org_name' => 'required',
            'validity' => 'required',
            'certificate' => ['mimes:jpg, jpeg, png', 'max:2048'],
        ]);

        $mpo->update($mpoInfo);

        return redirect()->route('mpo.index')->with('message', 'Membership In Professional Organization Information Successfully Updated');
    }

    public function destroy(Mpo $mpo)
    {
        $mpo->delete();

        return redirect(route('mpo.index'))->with('message', 'Membership In Professional Organization Information Successfully Deleted');
    }
}
