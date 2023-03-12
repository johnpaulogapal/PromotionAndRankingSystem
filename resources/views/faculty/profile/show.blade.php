<x-faculty.layout>
    <x-faculty.navigation>
        @if(session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-100 border-l-4 border-green-700 text-green-700 px-5 py-2 shadow-lg">
                <p class="text-lg tracking-widest">
                    <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
                </p>
            </div>
        @endif
        <section>
            <form method="POST" action="{{route('profile.store', auth()->user()->id)}}" class="pt-16 p-8 h-screen w-full">
            @csrf
                <p class="px-10 mb-2 uppercase text-xl tracking-widest"><i class="fa-solid fa-id-badge text-hau mr-2"></i>Personal and Application Information</p>
                <div class="px-10 grid grid-cols-3 gap-x-12">
                    <div class="col-span-2 py-10 px-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-5">
                        <div class="space-y-8">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex flex-col justify-start gap-1">
                                    <img src="{{asset('uploads/' . $user->avatar)}}" alt="" class="w-3/4 object-cover border-2 border-hau">
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="flex flex-col justify-start gap-1">
                                        <b class="text-hau text-sm tracking-wide">Employee No.</b>
                                        <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->emp_num}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start gap-1">
                                        <b class="text-hau text-sm tracking-wide">Faculty</b>
                                        <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->faculty}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start gap-1">
                                        <b class="text-hau text-sm tracking-wide">Department</b>
                                        <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->department}}</p>
                                    </div>
                                    
                                </div>
                            </div>
        
                            <div class="grid grid-cols-3 gap-4">
                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">First Name</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->first_name}}</p>
                                </div>
                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">Middle Name</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->middle_name}}</p>
                                </div>
                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">Last Name</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->last_name}}</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">Birthdate</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{date('F d, Y', strtotime($user->birth_date))}}</p>
                                </div>
                               
                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">Age</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->age}}</p>
                                </div>

                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">Sex</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->sex}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-10 px-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-5">
                        <div class="px-5 grid grid-rows-4 gap-y-8">
                            <div class="flex flex-col justify-start gap-1">
                                <b class="text-hau text-sm tracking-wide">Date Hired</b>
                                <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{date('F d, Y', strtotime($application->date_hired))}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="text-hau text-sm tracking-wide">Current Rank</b>
                                <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$application->current_rank}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="text-hau text-sm tracking-wide">Date of Last Promotion</b>
                                <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{date('F d, Y', strtotime($user->date_last_prom))}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="text-hau text-sm tracking-wide">Proposed Rank</b>
                                <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$application->proposed_rank}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 p-5 flex justify-center gap-x-4">
                    <a href="{{route('profile.edit', $user->id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-600 duration-300">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                    </a>
                </div>
            </form>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>