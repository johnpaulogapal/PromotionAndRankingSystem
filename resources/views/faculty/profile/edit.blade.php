<x-faculty.layout>
    <x-faculty.navigation>
        
        <section>
            <form method="POST" action="{{route('profile.update', ['user' => $user->id, 'application' => $application->id])}}" class="pt-16 p-8 h-screen w-full">
            @csrf
            @method('PUT')
                <div class="grid grid-cols-3 gap-x-12">
                    <div class="col-span-2 py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold text-hau text-lg tracking-widest">Employee Information</p>
                        <div class="grid grid-rows-3 gap-8">
                            <div class="grid grid-cols-3 gap-x-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Faculty</label>
                                    <input name="faculty" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->faculty}}" >
                                </div>
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Department</label>
                                    <input name="department" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->department}}" >
                                </div>
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Employee No.</label>
                                    <input name="emp_num" type="number" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->emp_num}}">
                                </div>
                            </div>
        
                            <div class="grid grid-cols-3 gap-x-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">First Name</label>
                                    <input name="first_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->first_name}}">
                                </div>
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Middle Name</label>
                                    <input name="middle_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->middle_name}}">
                                </div>
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Last Name</label>
                                    <input name="last_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->last_name}}">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-x-8 justify-items-start place-items-center">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Birthdate</label>
                                    <input name="birth_date" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$user->birth_date}}">
                                </div>
                               
                                <div class="flex flex-col gap-1">
                                    <label class="font-bold text-hau text-sm tracking-wider">Sex</label>
                                    <div class="flex justify-center items-center gap-x-4 py-1">
                                        <div class="">
                                            <input {{$user->sex == 'Male' ? 'checked' : ''}} name="sex" type="radio" value="Male" class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500">
                                            <label for="" class="text-hau tracking-wider">Male</label>
                                        </div>   
                                        <div class="">
                                            <input {{$user->sex == 'Female' ? 'checked' : ''}} name="sex" type="radio" value="Female" class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500">
                                            <label for="" class="text-hau tracking-wider">Female</label>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold text-hau text-lg tracking-widest">Application Information</p>
                        <div class="px-5 grid grid-rows-1 gap-4">
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Date Hired</label>
                                <input name="date_hired" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$application->date_hired}}">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Current Rank</label>
                                <input name="current_rank" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$application->current_rank}}">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Date of Last Promotion</label>
                                <input name="date_last_prom" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$application->date_last_prom}}">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Proposed Rank</label>
                                <input name="proposed_rank" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$application->proposed_rank}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 flex justify-center gap-x-4">
                    <a href="{{route('profile.show', auth()->user()->id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-400 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-500 duration-300">
                        <i class="fa-regular fa-circle-xmark mr-1"></i>Cancel
                    </a>
                    <button class="py-1.5 px-4 text-xl text-white tracking-widest bg-green-600 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-700 duration-300">
                        <i class="fa-regular fa-circle-check mr-1"></i>Save
                    </button>
                </div>
            </form>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>