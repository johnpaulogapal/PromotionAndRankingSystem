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
            
        <form method="POST" action="{{route('profile.store', auth()->user()->id)}}" class="pt-10 md:pt-20 p-1 md:p-8 h-screen">
        @csrf
            <p class="px-10 mb-2 uppercase text-xl tracking-widest"><i class="fa-solid fa-id-badge text-hau mr-2"></i>Personal and Application Information</p>
            <div class="px-10">
                <div class="py-10 px-5 border-t-4 {{ $user->status == 'verified' ? 'border-green-700' : 'border-hau'}} rounded-b-lg shadow-2xl space-y-5">
                    @if($user->status == 'resubmit')
                    <h5 class="font-bold uppercase text-center text-lg text-orange-700">
                        <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                        Please Edit this Information
                    </h5>
                    @endif

                    @if($user->status == 'verified')
                    <h5 class="font-bold uppercase text-center text-lg text-green-700">
                        <i class="fa-solid fa-circle-check mr-1"></i></i>
                        This Information has been Verified
                    </h5>
                    @endif
                    <div class="grid grid-cols-4 gap-y-8">
                        <div class="mr-5 md:m-0 flex flex-col justify-start gap-1">
                            <img src="{{asset('uploads/' . $user->avatar)}}" alt="" class="h-32 w-32 md:h-60 md:w-60 object-cover border-2 border-hau">
                        </div>
                        <div class="col-span-3 grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Employee No.</b>
                                <p class="text-hau text-lg">  {{$user->emp_num}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Department</b>
                                <p class="text-hau text-lg">  {{$user->department}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Contact Number</b>
                                <p class="text-hau text-lg">  {{$user->contact_num}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">First Name</b>
                                <p class="text-hau text-lg">  {{$user->first_name}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Middle Name</b>
                                <p class="text-hau text-lg">  {{$user->middle_name}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Last Name</b>
                                <p class="text-hau text-lg">  {{$user->last_name}}</p>
                            </div>

                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Birthdate</b>
                                <p class="text-hau text-lg">  {{date('F d, Y', strtotime($user->birth_date))}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Age</b>
                                <p class="text-hau text-lg">  {{$user->age}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Sex</b>
                                <p class="text-hau text-lg">  {{$user->sex}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5 border-2 border-dashed border-gray-300">
                <div class="grid grid-cols-1 md:grid-cols-3 content-start">
                    <div class="md:col-span-2 py-5 px-12 border-t-4 {{ $application->status == 'verified' ? 'border-green-700' : 'border-hau'}} rounded-b-lg shadow-2xl">
                        @if($application->status == 'resubmit')
                        <h5 class="font-bold uppercase text-center text-lg text-orange-700">
                            <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                            Please Edit this Information
                        </h5>
                        @endif
    
                        @if($application->status == 'verified' || $application->app_status == 'approved')
                        <h5 class="font-bold uppercase text-center text-lg text-green-700">
                            <i class="fa-solid fa-circle-check mr-1"></i></i>
                            This Information has been Verified
                        </h5>
                        @endif
                        <div class="mt-2 grid grid-cols-2 gap-8">
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Date Hired</b>
                                <p class="text-hau text-lg">  {{date('F d, Y', strtotime($application->date_hired))}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Current Rank</b>
                                <p class="text-hau text-lg">  {{$application->current_rank}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Date of Last Promotion</b>
                                <p class="text-hau text-lg">  {{date('F d, Y', strtotime($application->date_last_prom))}}</p>
                            </div>
                            <div class="flex flex-col justify-start gap-1">
                                <b class="font-bold uppercase text-hau tracking-widest">Proposed Rank</b>
                                <p class="text-hau text-lg">  {{$application->proposed_rank}}</p>
                            </div>
                        </div>
                    </div>
                    @if($application->app_status == 'approved')
                        <p></p>
                    @else
                        @if(($user->status == 'pending' || $user->status == 'resubmit') || ($application->status == 'pending' || $application->status == 'resubmit'))
                        <div class="flex justify-center items-center gap-x-4">
                            <a href="{{route('profile.edit', $user->id)}}" class="py-1 px-2 uppercase text-white tracking-widest bg-yellow-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-yellow-600 duration-300">
                                <i class="fa-regular fa-pen-to-square mr-1"></i>Edit
                            </a>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
           
        </form>
    </section>

    </x-faculty.navigation>
</x-faculty.layout>