<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{


   public function create()
   {
        return view('faculty.profile.create');
   }


   public function store(Request $request, User $user)
   {
      // dd($request->all());
      $formFields = $request->validate([
         'emp_num' => 'required',
         'first_name' => 'required',
         'middle_name' => 'required',
         'last_name' => 'required',
         'birth_date' => 'required',
         'sex' => 'required',
         'department' => 'required',
     ]);  
       
     $formFields['age'] = $this->getAge($request->birth_date);
     
   //   dd($formFields);
     $user->update($formFields);

     return redirect('/')->with('message', 's Created Successfully');
   }

   public function getAge($date) 
   {

      $age = Carbon::parse($date)->age;
      
      return $age;
   }
}
