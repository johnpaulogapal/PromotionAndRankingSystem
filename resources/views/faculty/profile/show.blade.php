<x-faculty.layout>
    <x-faculty.navigation>
        <section>
            <form method="POST" action="{{route('profile.store', auth()->user()->id)}}" class="pt-16 p-8 h-screen w-full">
            @csrf
                <div class="grid grid-cols-3 gap-x-12">
                    <div class="col-span-2 py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold text-hau text-xl tracking-widest">My Information:</p>
                        <div class="grid grid-rows-3 gap-8">
                            <div class="grid grid-cols-3 gap-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">Faculty</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->faculty}}</p>
                                </div>
                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">Department</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->department}}</p>
                                </div>
                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">Employee No.</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->emp_num}}</p>
                                </div>
                            </div>
        
                            <div class="grid grid-cols-3 gap-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">First Name</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->first_name}}</p>
                                </div>
                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">Middle Name</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->middle_name}}</p>
                                </div>
                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">Last Name</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->last_name}}</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">Birthdate</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{date('F d, Y', strtotime($user->birth_date))}}</p>
                                </div>
                               
                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">Age</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->age}}</p>
                                </div>

                                <div class="flex flex-col justify-center gap-1">
                                    <b class="text-hau text-sm tracking-wide">Sex</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->sex}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold text-hau text-lg tracking-widest">Application Information</p>
                        <div class="px-5 grid grid-rows-1 gap-4">
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Date Hired</label>
                                <input name="date_hired" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Current Rank</label>
                                <input name="current_rank" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Date of Last Promotion</label>
                                <input name="date_last_prom" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Proposed Rank</label>
                                <input name="proposed_rank" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 flex justify-center gap-x-4">
                   
                    <button class="py-1 px-2 text-lg text-white tracking-widest bg-yellow-600 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-700 duration-300">
                        <i class="fa-regular fa-circle-check mr-1"></i>Edit
                    </button>
                   
                </div>
            </form>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>