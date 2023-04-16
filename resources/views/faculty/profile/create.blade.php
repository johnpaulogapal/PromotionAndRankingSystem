<x-faculty.layout>
    
        @if(session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
            <p class="text-lg tracking-widest">
                <i class="fa-solid fa-check mr-2"></i>{{session('message') . " " . auth()->user()->email}}
            </p>
        </div>
        @endif
        <section>
            <div class="py-5 px-5 md:px-40 flex justify-between items-center">
                <div class="flex items-center gap-x-2">
                    <img src="{{asset('images/hau-logo.png')}}" alt="" class="w-12 md:w-24 mr-2">
                    <span class="uppercase text-xs md:text-xl tracking-widest">Please Fill in this Form to proceed. <span class="text-red-700">(All are required)</span></span> 
                </div>
                <form method="POST" action="{{route('logout')}}" class="md:p-2 px-0 text-center">
                    @csrf
                        <button class="lowercase py-1 px-2 md:uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                            <i class="fa-solid fa-power-off mr-1"></i>
                            Logout
                        </button>
                </form>
            </div>
            <form method="POST" action="{{route('profile.store', auth()->user()->id)}}" enctype="multipart/form-data" class="px-5 md:px-40 md:w-full">
            @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-2 md:gap-x-12">
                    <div class="col-span-2 py-10 px-1 md:px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold uppercase text-hau text-xl tracking-widest">Faculty Information</p>
                        <div class="grid grid-rows-3 gap-8">
                            
                            <div class="grid grid-cols-3 gap-x-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Employee No.</label>
                                    <input name="emp_num" type="number" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('emp_num')}}">
                                    @error('emp_num')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Department</label>
                                    <select name="department" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                        <option selected disabled>Select your Department</option>
                                        <option value="Basic Education">Basic Education</option>
                                        <option value="School of Business and Accountancy">School of Business and Accountancy</option>
                                        <option value="School of Engineering and Architecture">School of Engineering and Architecture</option>
                                        <option value="School of Arts and Sciences">School of Arts and Sciences</option>
                                        <option value="School of Education">School of Education</option>
                                        <option value="School of Hospitality and Tourism Management">School of Hospitality and Tourism Management</option>
                                        <option value="School of Nursing and Allied Medical Sciences">School of Nursing and Allied Medical Sciences</option>
                                        <option value="School of Computin">School of Computing</option>
                                        <option value="College of Criminal Justice Education and Forensics">College of Criminal Justice Education and Forensics</option>
                                    </select>
                                    @error('department')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>  
                                
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Contact No.</label>
                                    <input name="contact_num" type="tel" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('contact_num')}}" placeholder="09XXXXXXXXXXX" pattern="[0]{1}[9]{1}[0-9]{9}">
                                    @error('contact_num')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="grid grid-cols-3 gap-x-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">First Name</label>
                                    <input name="first_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('first_name')}}">
                                    @error('first_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Middle Name</label>
                                    <input name="middle_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('middle_name')}}">
                                    @error('middle_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                               
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Last Name</label>
                                    <input name="last_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('last_name')}}">
                                    @error('last_name')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>                             
                            </div>
                            
                            <div class="grid grid-cols-3 gap-x-8 justify-items-start place-items-center">
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Birthdate</label>
                                    <input name="birth_date" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('birth_date')}}">
                                    @error('birth_date')
                                        <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                             
                                <div class="flex flex-col gap-1">
                                    <label class="font-bold text-hau text-xs md:text-sm tracking-wider">Sex</label>
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
                                    <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Upload your image <span class="text-red-700">(Max Size 2MB)</span></label>
                                    <input name="avatar" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                                    @error('avatar')
                                        <p class="font-bold text-xs text-red-500 mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="py-10 p-1 md:px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold uppercase text-hau text-xl text-center tracking-widest">Application Information</p>
                        <div class="px-1 md:px-5 grid grid-rows-1 gap-4">
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Date Hired</label>
                                <input name="date_hired" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('date_hired')}}">
                                @error('date_hired')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                                @if(session()->has('errorDate'))
                                    <p class="font-bold text-red-500 mt-1">{{session('errorDate')}}</p>
                                @endif
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Current Rank</label>
                                <select name="current_rank" class="w-full py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                    <option selected disabled>Select your Current Rank</option>
                                    <option value="Instructor - I">Instructor - I</option>
                                    <option value="Instructor - II">Instructor - II</option>
                                    <option value="Instructor - III">Instructor - III</option>
                                    <option value="Assistant Professor - I">Assistant Professor - I</option>
                                    <option value="Assistant Professor - II">Assistant Professor - II</option>
                                    <option value="Assistant Professor - III">Assistant Professor - III</option>
                                    <option value="Assistant Professor - IV">Assistant Professor - IV</option>
                                    <option value="Associate Professor - I">Associate Professor - I</option>
                                    <option value="Associate Professor - II">Associate Professor - II</option>
                                    <option value="Associate Professor - III">Associate Professor - III</option>
                                    <option value="Associate Professor - IV">Associate Professor - IV</option>
                                    <option value="Associate Professor - V">Associate Professor - V</option>
                                    <option value="Professor - I">Professor - I</option>
                                    <option value="Professor - II">Professor - II</option>
                                    <option value="Professor - III">Professor - III</option>
                                    <option value="Professor - IV">Professor - IV</option>
                                    <option value="Professor - I">Professor - I</option>
                                    <option value="Professor - II">Professor - II</option>
                                    <option value="Professor - III">Professor - III</option>
                                    <option value="Professor - IV">Professor - IV</option>
                                    <option value="Professor - V">Professor - V</option>
                                    <option value="Professor - VI">Professor - VI</option>
                                </select>
                                @error('current_rank')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div> 
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Date of Last Promotion</label>
                                <input name="date_last_prom" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('date_last_prom')}}">
                                @error('date_last_prom')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-xs md:text-sm tracking-wider">Proposed Rank</label>
                                <select name="proposed_rank" class="w-full py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                    <option selected disabled>Select your Proposed Rank</option>
                                    <option value="Instructor - I">Instructor - I</option>
                                    <option value="Instructor - II">Instructor - II</option>
                                    <option value="Instructor - III">Instructor - III</option>
                                    <option value="Assistant Professor - I">Assistant Professor - I</option>
                                    <option value="Assistant Professor - II">Assistant Professor - II</option>
                                    <option value="Assistant Professor - III">Assistant Professor - III</option>
                                    <option value="Assistant Professor - IV">Assistant Professor - IV</option>
                                    <option value="Associate Professor - I">Associate Professor - I</option>
                                    <option value="Associate Professor - II">Associate Professor - II</option>
                                    <option value="Associate Professor - III">Associate Professor - III</option>
                                    <option value="Associate Professor - IV">Associate Professor - IV</option>
                                    <option value="Associate Professor - V">Associate Professor - V</option>
                                    <option value="Professor - I">Professor - I</option>
                                    <option value="Professor - II">Professor - II</option>
                                    <option value="Professor - III">Professor - III</option>
                                    <option value="Professor - IV">Professor - IV</option>
                                    <option value="Professor - I">Professor - I</option>
                                    <option value="Professor - II">Professor - II</option>
                                    <option value="Professor - III">Professor - III</option>
                                    <option value="Professor - IV">Professor - IV</option>
                                    <option value="Professor - V">Professor - V</option>
                                    <option value="Professor - VI">Professor - VI</option>
                                </select>
                                @error('proposed_rank')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="mt-1 md:mt-12 flex justify-end">
                    <button class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                        <i class="fa-solid fa-arrow-right-from-bracket mr-1"></i>
                        Proceed
                    </button>
                </div>
            </form>
        </section>
  
</x-faculty.layout>