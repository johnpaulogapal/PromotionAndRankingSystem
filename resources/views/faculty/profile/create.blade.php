<x-faculty.layout>
    
        @if(session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
            <p class="text-lg tracking-widest">
                <i class="fa-solid fa-check mr-2"></i>{{session('message') . " " . auth()->user()->email}}
            </p>
        </div>
        @endif
        <section>
            <div class="py-5 px-40 flex justify-between items-center">
                <div class="flex items-center gap-x-2">
                    <img src="{{asset('images/hau-logo.png')}}" alt="" class="w-24 mr-2">
                    <span class="uppercase text-xl tracking-widest">Please Fill in this Form to proceed. <span class="text-red-700">(All are required)</span></span> 
                </div>
                <form method="POST" action="{{route('logout')}}" class="p-5 px-0 text-center">
                    @csrf
                        <button class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                            <i class="fa-solid fa-power-off mr-1"></i>
                            Logout
                        </button>
                </form>
            </div>
            <form method="POST" action="{{route('profile.store', auth()->user()->id)}}" enctype="multipart/form-data" class="py-5 px-40 w-full">
            @csrf
                <div class="grid grid-cols-3 gap-x-12">
                    <div class="col-span-2 py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold uppercase text-hau text-xl tracking-widest">Employee Information</p>
                        <div class="grid grid-rows-3 gap-8">
                            <div class="grid grid-cols-3 gap-x-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Faculty</label>
                                    <input name="faculty" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('faculty')}}">
                                    @error('faculty')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                               
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Department</label>
                                    <input name="department" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('department')}}">
                                    @error('department')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Employee No.</label>
                                    <input name="emp_num" type="number" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('emp_num')}}">
                                    @error('emp_num')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                               
                            </div>
        
                            <div class="grid grid-cols-3 gap-x-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">First Name</label>
                                    <input name="first_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('first_name')}}">
                                    @error('first_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Middle Name</label>
                                    <input name="middle_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('middle_name')}}">
                                    @error('middle_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                               
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Last Name</label>
                                    <input name="last_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('last_name')}}">
                                    @error('last_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>                             
                            </div>
                            
                            <div class="grid grid-cols-3 gap-x-8 justify-items-start place-items-center">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Birthdate</label>
                                    <input name="birth_date" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('birth_date')}}">
                                    @error('birth_date')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                             
                                <div class="flex flex-col gap-1">
                                    <label class="font-bold text-hau text-sm tracking-wider">Sex</label>
                                    <div class="flex justify-center items-center gap-x-4 py-1">
                                        <div class="">
                                            <input name="sex" type="radio" value="Male" class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500">
                                            <label for="" class="text-hau tracking-wider">Male</label>
                                        </div>   
                                        <div class="">
                                            <input name="sex" type="radio" value="Female" class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500">
                                            <label for="" class="text-hau tracking-wider">Female</label>
                                        </div> 
                                    </div>
                                    @error('sex')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Upload your image</label>
                                    <input name="avatar" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                                    @error('avatar')
                                        <p class="font-bold text-xs text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold uppercase text-hau text-xl text-center tracking-widest">Application Information</p>
                        <div class="px-5 grid grid-rows-1 gap-4">
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Date Hired</label>
                                <input name="date_hired" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('date_hired')}}">
                                @error('date_hired')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Current Rank</label>
                                <input name="current_rank" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('current_rank')}}">
                                @error('current_rank')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Date of Last Promotion</label>
                                <input name="date_last_prom" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('date_last_prom')}}">
                                @error('date_last_prom')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Proposed Rank</label>
                                <input name="proposed_rank" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('proposed_rank')}}">
                                @error('proposed_rank')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 flex justify-end">
                    <button class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                        <i class="fa-solid fa-arrow-right-from-bracket mr-1"></i>
                        Proceed
                    </button>
                </div>
            </form>
        </section>
  
</x-faculty.layout>