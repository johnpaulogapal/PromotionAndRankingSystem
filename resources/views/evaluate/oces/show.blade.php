<x-evaluator.layout>
    <x-evaluator.navigation>
        
    @if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
        <p class="text-lg tracking-widest">
            <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
        </p>
    </div>
    @endif 

    <div class="pt-24 p-32 flex flex-col">

        <div class="flex justify-start my-5">
            <a href="/evaluator-oces" class="py-1 px-2 text-white tracking-widest bg-gray-700 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                <i class="fa-solid fa-arrow-left mr-1"></i>Back
            </a>
        </div>

        @if($user->user_type == 'basicEd')
            @include('partials.evaluator.oces._basicEd')
        @else
            @include('partials.evaluator.oces._college')
        @endif

        <div class="w-full mt-20 p-12 border-t-8 border-hau rounded shadow-2xl">
            <h1 class="w-full font-bold uppercase text-2xl text-center tracking-widest">Personal Information</h1>
            <div class="py-8">
                <div class="grid grid-cols-4 gap-8">
                    <div class="flex flex-col justify-start gap-1">
                        <img src="{{asset('uploads/' . $user->avatar)}}" alt="" class="h-60 w-60 object-cover border-2 border-hau">
                    </div>
                    <div class="col-span-3 grid grid-cols-3 gap-4">
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Employee No.</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->emp_num}}</p>
                        </div>
                        
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Department</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->department}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Contact No.</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->contact_num}}</p>
                        </div>
                        
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">First Name</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->first_name}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Middle Name</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->middle_name}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Last Name</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->last_name}}</p>
                        </div>

                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Birthdate</b>
                            <p class="text-hau text-lg tracking-widest">  {{date('F d, Y', strtotime($user->birth_date))}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Age</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->age}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Sex</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->sex}}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-10 p-12 border-t-8 border-hau rounded shadow-2xl">
            <h1 class="w-full font-bold uppercase text-2xl text-center tracking-widest">Application Information</h1>
            <div class="py-8 flex justify-center">
                <div class="mt-2 grid grid-cols-2 gap-y-5 gap-x-20">
                    <div class="flex flex-col justify-start items-start gap-1">
                        <b class="font-bold uppercase text-hau tracking-widest">Date Hired</b>
                        <p class="text-hau text-lg">  {{date('F d, Y', strtotime($user->application->date_hired))}}</p>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-1">
                        <b class="font-bold uppercase text-hau tracking-widest">Current Rank</b>
                        <p class="text-hau text-lg">  {{$user->application->current_rank}}</p>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-1">
                        <b class="font-bold uppercase text-hau tracking-widest">Date of Last Promotion</b>
                        <p class="text-hau text-lg">  {{date('F d, Y', strtotime($user->application->date_last_prom))}}</p>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-1">
                        <b class="font-bold uppercase text-hau tracking-widest">Proposed Rank</b>
                        <p class="text-hau text-lg">  {{$user->application->proposed_rank}}</p>
                    </div>
                </div>
            </div>
        </div>

       

    </div>

    

    </x-evaluator.navigation>
</x-evaluator.layout>
