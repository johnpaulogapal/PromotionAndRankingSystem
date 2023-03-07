<?php

namespace App\Http\Controllers;

use App\Models\Application;
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

      $userInfo = $request->validate([
         'emp_num' => 'required',
         'first_name' => 'required',
         'middle_name' => 'required',
         'last_name' => 'required',
         'birth_date' => 'required',
         'sex' => 'required',
         'department' => 'required',
         'faculty' => 'required',
     ]);

     $userInfo['age'] = $this->getAge($request->birth_date);

     $user->update($userInfo);

     $appInfo = $request->validate([
         'date_hired' => 'required',
         'current_rank' => 'required',
         'date_last_prom' => 'required',
         'proposed_rank' => 'required',
     ]);

     $appInfo['user_id'] = auth()->user()->id;

     Application::create($appInfo);

     return redirect('/')->with('message', 'Fill in Successfully. Welcome');
   }

   public function edit(User $user)
   {
        return view('faculty.profile.edit', [
            'user' => $user,
            'application' => $user->application
        ]);
   }

   public function update(Request $request, User $user, Application $application)
   {

      $userInfo = $request->validate([
         'emp_num' => 'required',
         'first_name' => 'required',
         'middle_name' => 'required',
         'last_name' => 'required',
         'birth_date' => 'required',
         'sex' => 'required',
         'department' => 'required',
         'faculty' => 'required',
     ]);

     $userInfo['age'] = $this->getAge($request->birth_date);

     $user->update($userInfo);

     $appInfo = $request->validate([
         'date_hired' => 'required',
         'current_rank' => 'required',
         'date_last_prom' => 'required',
         'proposed_rank' => 'required',
     ]);

     $application->update($appInfo);

     return redirect()->route('profile.show', auth()->user()->id)->with('message', 'Updated Successfully');
   }

   public function show(User $user)
   {
        return view('faculty.profile.show', [
            'user' => $user,
            'application' => $user->application
        ]);
   }

   // Functions
   public function getAge($date) 
   {

      $age = Carbon::parse($date)->age;
      
      return $age;
   }
}
