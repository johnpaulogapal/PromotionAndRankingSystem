<x-admin.layout>
    <x-admin.navigation>

        <div class="w-full pt-24 p-24 space-y-8">   

            <a href="{{ URL::previous() }}" class="py-1 px-2 text-white tracking-widest bg-gray-700 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                <i class="fa-solid fa-arrow-left mr-1"></i>Back
            </a>
            
            <div class="w-full p-12 border-t-8 border-hau rounded shadow-2xl">
                <h1 class="w-full font-bold uppercase text-2xl text-center tracking-widest">Evaluation of {{ $user->first_name . ' ' . $user->last_name }}</h1>
                <h2 class="w-full mb-5 font-bold uppercase text-lg text-center tracking-widest">College Faculty</h2>
                @include('partials.admin.score._collegescore')
            </div>
    
            {{-- Personal Info --}}
            <div class="w-full p-12 border-t-8 border-hau rounded shadow-2xl">
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
    
            {{-- Application Info --}}
            <div class="w-full p-12 border-t-8 border-hau rounded shadow-2xl">
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
    
            {{-- Edu Bg Info --}}
            <div class="w-full p-12 border-t-8 border-hau rounded shadow-2xl">
                <h1 class="w-full font-bold uppercase text-2xl text-center tracking-widest">Educational Background Information</h1>
                <div class="grid grid-cols-3 justify-items-center gap-4">
    
                    {{-- Undergrad --}}
                    <div class="py-8">
                        <h2 class="w-full font-bold uppercase text-lg tracking-widest mb-8">Undergrad Information</h2>
                        @foreach ($user->undergrads as $undergrad)
                        <div class="flex flex-col gap-4">
                            
                            <div class="flex flex-col justify-start ">
                                <b class="font-bold uppercase text-hau tracking-widest">School</b>
                                <p class="text-lg text-hau">{{$undergrad->school}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Course</b>
                                <p class="text-lg text-hau">{{$undergrad->course}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Graduation Date</b>
                                <p class="text-lg text-hau">{{date('F d, Y', strtotime($undergrad->graduation_date))}}</p>
                            </div>
                            <div class="">
                                <b class="font-bold uppercase text-hau tracking-widest">TOR - </b>
                                <a href="{{asset('uploads/' . $undergrad->tor)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                                    Download
                                </a>
                            </div>
                           
                        </div>
                        @endforeach
                    </div>
    
                    {{-- Masters --}}
                    <div class="py-8">
                        <h2 class="w-full font-bold uppercase text-lg tracking-widest mb-8">Masters Information</h2>
                        @forelse ($user->masters as $master)
                        <div class="flex flex-col gap-4">
                            
                            <div class="flex flex-col justify-start ">
                                <b class="font-bold uppercase text-hau tracking-widest">School</b>
                                <p class="text-lg text-hau">{{$master->school}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Course</b>
                                <p class="text-lg text-hau">{{$master->course}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Graduation Date</b>
                                <p class="text-lg text-hau">{{date('F d, Y', strtotime($master->graduation_date))}}</p>
                            </div>
                            <div class="">
                                <b class="font-bold uppercase text-hau tracking-widest">TOR - </b>
                                <a href="{{asset('uploads/' . $master->tor)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                                    Download
                                </a>
                            </div>
                           
                        </div>
                        @empty
                            <p class="font-bold uppercase text-lg text-center tracking-widest">N/A</p>
                        @endforelse
                    </div>
    
                    {{-- PHD --}}
                    <div class="py-8">
                        <h2 class="w-full font-bold uppercase text-lg tracking-widest mb-8">PHD Information</h2>
                        @forelse ($user->phds as $phd)
                        <div class="flex flex-col gap-4">
                            
                            <div class="flex flex-col justify-start ">
                                <b class="font-bold uppercase text-hau tracking-widest">School</b>
                                <p class="text-lg text-hau">{{$phd->school}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Course</b>
                                <p class="text-lg text-hau">{{$phd->course}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Graduation Date</b>
                                <p class="text-lg text-hau">{{date('F d, Y', strtotime($phd->graduation_date))}}</p>
                            </div>
                            <div class="">
                                <b class="font-bold uppercase text-hau tracking-widest">TOR - </b>
                                <a href="{{asset('uploads/' . $phd->tor)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                                    Download
                                </a>
                            </div>
                           
                        </div>
                        @empty
                            <p class="font-bold uppercase text-lg text-center tracking-widest">N/A</p>
                        @endforelse
                    </div>
    
                </div>
            </div>
    
            {{-- Prc Info --}}
            <div class="w-full p-12 border-t-8 border-hau rounded shadow-2xl">
                <h1 class="w-full font-bold uppercase text-2xl text-center tracking-widest">PRC License Information</h1>
                <div class="py-8">
                    @forelse ($user->prcs as $prc)
                    <div class="flex flex-col items-center justify-center gap-4 border-b-4 p-5 border-gray-200 border-dashed">
                        <div class="col-span-2 grid grid-cols-3 gap-x-4">
                            <a href="{{asset('uploads/' . $prc->prc_front)}}"><img src="{{asset('uploads/' . $prc->prc_front)}}" alt="" class="aspect-video transition ease-in-out delay-150 hover:scale-110 duration-300"></a>
                            <a href="{{asset('uploads/' . $prc->prc_back)}}"><img src="{{asset('uploads/' . $prc->prc_back)}}" alt="" class="aspect-video transition ease-in-out delay-150 hover:scale-110 duration-300"></a>
                            <a href="{{asset('uploads/' . $prc->prc_certificate)}}"><img src="{{asset('uploads/' . $prc->prc_certificate)}}" alt="" class="aspect-video transition ease-in-out delay-150 hover:scale-110 duration-300"></a>
                        </div>
                        <div class="md:pt-10 grid grid-cols-2 gap-x-8 justify-items-center">
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">License Number</b>
                                <p class="text-lg text-hau">{{$prc->prc_num}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Validity</b>
                                <p class="text-lg text-hau">{{date('F d, Y', strtotime($prc->prc_num))}}</p>
                            </div>
                        </div>
                        @empty
                            <p class="font-bold uppercase text-lg text-center tracking-widest">N/A</p>
                        @endforelse
                    </div>
                </div>
            </div>
    
            {{-- MPO Info --}}
            <div class="w-full mt-10 p-12 border-t-8 border-hau rounded shadow-2xl">
                <h1 class="w-full font-bold uppercase text-2xl text-center tracking-widest">Membership in Professional Organization Information</h1>
                <div class="py-8 flex flex-col justify-center items-center m-5 border-b-4 border-gray-200 border-dashed">
                    @forelse($user->mpos as $mpo)
                    <div class="grid grid-cols-3 gap-x-8">
                        <div class="flex flex-col justify-center">
                            <b class="font-bold uppercase text-hau tracking-widest">Organiztion Name</b>
                            <p class="text-hau text-lg">{{$mpo->org_name}}</p>
                        </div>
                        <div class="flex flex-col justify-center">
                            <b class="font-bold uppercase text-hau tracking-widest">Validity</b>
                            <p class="text-hau text-lg">{{date('F d, Y', strtotime($mpo->mpo_num))}}</p>
                        </div>
                        <div class="flex flex-col">
                            <b class="font-bold uppercase text-hau tracking-widest">Certificate</b>
                            <a href="{{asset('uploads/' . $mpo->certificate)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                                Download
                            </a>
                        </div>
                    </div>
                    @empty
                        <p class="font-bold uppercase text-lg text-center tracking-widest">N/A</p>
                    @endforelse
                </div>
            </div>
    
            {{-- Training Info --}}
            <div class="w-full mt-10 p-12 border-t-8 border-hau rounded shadow-2xl">
                <h1 class="w-full font-bold uppercase text-2xl text-center tracking-widest">Trainings/Seminars/Webinars Information</h1>
                <div class="py-8">
                    <div class="p-5 flex flex-col border-b-4 border-gray-200 border-dashed">
                        @forelse($user->trainings as $training)
                        <div class="grid grid-cols-3 gap-8">
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">From</b>
                                <p class="text-hau text-lg">{{date('F d, Y', strtotime($training->from))}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">To</b>
                                <p class="text-hau text-lg">{{date('F d, Y', strtotime($training->to))}}</p>
                            </div>
                            <div class="col-start-1 flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Title</b>
                                <p class="text-hau text-lg">{{$training->title}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Speaker</b>
                                <p class="text-hau text-lg">{{$training->speaker}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Venue</b>
                                <p class="text-hau text-lg">{{$training->venue}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Institution</b>
                                <p class="text-hau text-lg">{{$training->institution}}</p>
                            </div>
                            <div class="col-span-2">
                                <b class="font-bold uppercase text-hau tracking-widest">Certificate - </b>
                                <a href="{{asset('uploads/' . $training->certificate)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                                    Download
                                </a>
                            </div>
                            @empty
                                <p class="font-bold uppercase text-lg text-center tracking-widest">N/A</p>
                            @endforelse
                           
                        </div>
                    </div>
                </div>
            </div>
    
        </div>

    </x-admin.navigation>
</x-admin.layout>