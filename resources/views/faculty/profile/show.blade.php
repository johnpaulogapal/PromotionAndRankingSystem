<x-faculty.layout>
    <x-faculty.navigation>
        <section>
            <form method="POST" action="{{route('profile.store', auth()->user()->id)}}" class="pt-16 p-8 h-screen w-full">
            @csrf
                <div class="grid grid-cols-3 gap-x-12">
                    <div class="col-span-2 py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold text-hau text-xl tracking-widest">My Information:</p>
                        <div class="grid grid-rows-3 gap-y-8">
                            <div class="grid grid-cols-3 gap-4">
                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">Faculty</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->faculty}}</p>
                                </div>
                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">Department</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->department}}</p>
                                </div>
                                <div class="flex flex-col justify-start gap-1">
                                    <b class="text-hau text-sm tracking-wide">Employee No.</b>
                                    <p class="text-hau text-lg tracking-widest underline underline-offset-8">  {{$user->emp_num}}</p>
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
                    <div class="py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold text-hau text-xl tracking-widest">Application Information</p>
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
                <div class="mt-12 flex justify-center gap-x-4">
                    <a href="{{route('profile.edit', $user->id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-600 duration-300">
                        <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                    </a>
                </div>
            </form>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>