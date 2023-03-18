<x-faculty.layout>
    <x-faculty.navigation>
        
        <section>
            <form method="POST" action="{{route('profile.update', ['user' => $user->id, 'application' => $application->id])}}" enctype="multipart/form-data" class="pt-20 p-8 h-screen w-full">
            @csrf
            @method('PUT')
            <p class="px-10 mb-2 uppercase text-xl tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</span> Personal and Application Information</p>
            <div class="px-10">
                <div class="py-10 px-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-5">
                    <div class="grid grid-cols-4 gap-y-8">
                        <div class="flex flex-col justify-start gap-1">
                            <img src="{{asset('uploads/' . $user->avatar)}}" alt="" class="h-60 w-60 object-cover border-2 border-hau">
                        </div>
                        <div class="col-span-3 grid grid-cols-3 gap-y-4 gap-x-12">
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Employee No.</label>
                                <input name="emp_num" type="number" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->emp_num}}">
                                @error('emp_num')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Faculty</label>
                                <input name="faculty" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->faculty}}" >
                                @error('faculty')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Department</label>
                                <input name="department" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->department}}" >
                                @error('department')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">First Name</label>
                                <input name="first_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->first_name}}">
                                @error('first_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Middle Name</label>
                                <input name="middle_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->middle_name}}">
                                @error('middle_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Last Name</label>
                                <input name="last_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->last_name}}">
                                @error('last_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Update your image</label>
                                <input name="avatar" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                                @error('avatar')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                           
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Birthdate</label>
                                <input name="birth_date" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->birth_date}}">
                                @error('birth_date')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                           
                            <div class="flex flex-col justify-center items-start gap-1">
                                <label class="font-bold text-hau text-sm tracking-wider">Sex</label>
                                <div class="flex items-center gap-x-4 py-1">
                                    <div class="">
                                        <input {{$user->sex == 'Male' ? 'checked' : ''}} name="sex" type="radio" value="Male" class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500">
                                        <label for="" class="text-hau tracking-wider">Male</label>
                                    </div>   
                                    <div class="">
                                        <input {{$user->sex == 'Female' ? 'checked' : ''}} name="sex" type="radio" value="Female" class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500">
                                        <label for="" class="text-hau tracking-wider">Female</label>
                                    </div> 
                                </div>
                                @error('sex')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="my-5 border-2 border-dashed border-gray-300">
                <div class="grid grid-cols-2 content-start">
                    <div class="px-5 grid grid-cols-2 gap-y-4 gap-x-12 py-10 px-5  border-t-4 border-hau rounded-b-lg shadow-2xl">
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider">Date Hired</label>
                            <input name="date_hired" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$application->date_hired}}">
                            @error('date_hired')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider">Current Rank</label>
                            <input name="current_rank" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$application->current_rank}}">
                            @error('current_rank')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider">Date of Last Promotion</label>
                            <input name="date_last_prom" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$application->date_last_prom}}">
                            @error('date_last_prom')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider">Proposed Rank</label>
                            <input name="proposed_rank" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$application->proposed_rank}}">
                            @error('proposed_rank')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-center items-center gap-x-4">
                        <a href="{{route('profile.show', auth()->user()->id)}}" class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                            <i class="fa-solid fa-xmark mr-1"></i>Cancel
                        </a>
                        <button class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                            <i class="fa-solid fa-check mr-1"></i>Save
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>