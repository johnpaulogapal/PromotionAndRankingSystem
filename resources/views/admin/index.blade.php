<x-admin.layout>
    <x-admin.navigation>
       
        {{-- <div class="pt-24 pb-5 px-10">
            <div class="p-5 grid grid-cols-4 justify-items-center gap-8">
                <div class="h-60 w-60 p-5 border-t-8 border-hau flex flex-col justify-around items-center gap-4 bg-yellow-500/25 rounded-b-lg shadow-2xl">
                    <h5 class="font-bold text-hau text-xl tracking-widest text-center"><i class="fa-solid fa-pause mr-1"></i>Pending Applications</h5>
                    <span class="font-bold text-hau text-6xl">
                        {{$pendingCount}}
                    </span>
                </div>
                <div class="h-60 w-60 p-5 border-t-8 border-hau flex flex-col justify-around items-center gap-4 bg-orange-500/25 rounded-b-lg shadow-2xl">
                    <h5 class="font-bold text-hau text-xl tracking-widest text-center"><i class="fa-solid fa-gear mr-1"></i>Ongoing Applications</h5>
                    <span class="font-bold text-hau text-6xl">
                        {{$ongoingCount}}
                    </span>
                </div>
                <div class="h-60 w-60 p-5 border-t-8 border-hau flex flex-col justify-around items-center gap-4 bg-green-500/25 rounded-b-lg shadow-2xl">
                    <h5 class="font-bold text-hau text-xl tracking-widest text-center"><i class="fa-solid fa-check-to-slot mr-1"></i>Approved Applications</h5>
                    <span class="font-bold text-hau text-6xl">
                        {{$approvedCount}}
                    </span>
                </div>
                <div class="h-60 w-60 p-5 border-t-8 border-hau flex flex-col justify-around items-center gap-4 bg-cyan-500/25 rounded-b-lg shadow-2xl">
                    <h5 class="font-bold text-hau text-xl tracking-widest text-center"><i class="fa-solid fa-users mr-1"></i>Total Users</h5>
                    <span class="font-bold text-hau text-6xl">
                        {{$userCount}}
                    </span>
                </div>
            </div>

            <div class="w-full mt-3 p-20">
                <h3 class="font-bold uppercase text-xl tracking-widest">This Week Applications</h3>
                <div class="pt-3 grid grid-cols-3 gap-2">
                    @forelse ($weekApplications as $application)
                    <a href="{{route('pending.index')}}" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-125 hover:text-gray-900 duration-300">
                        <div class="p-5 border-t-4 bg-gray-200 border-hau rounded-b-lg shadow-2xl">
                            <div class="flex flex-col">
                                <p class="font-bold tracking-widest">App No. {{$application->id}}</p>
                                <p class="font-bold tracking-widest">Email: {{$application->user->email}}</p>
                                <p class="font-bold tracking-widest">Full Name: {{$application->user->first_name . ' ' . $application->user->last_name}}</p>
                                <p class="font-bold tracking-widest">Submitted on: {{date('F d, Y', strtotime($application->created_at))}}</p>
                            </div>
                        </div>
                    </a>
                    @empty
                        <p class="font-bold text-2xl tracking-widest">No Application</p>
                    @endforelse   
                </div>
                
            </div>
        </div> --}}


        <div class="pt-24 pb-5 px-10">
            <div class="grid grid-cols-5 content-start gap-20">

                <div class="col-span-3 grid grid-cols-2 gap-10">
                    
                    <div class="flex justify-between items-center bg-gray-100 h-40 w-full rounded shadow-2xl">
                        <div class="p-4 space-y-2">
                            <h5 class="font-bold text-lg text-yellow-600">PENDING APPLICATIONS</h5>
                            <h6 class="font-bold text-4xl text-yellow-600">{{$pendingCount}}</h6>
                        </div>
                        <div class="h-full p-4 flex items-center bg-yellow-500">
                            <i class="fa-solid fa-file-circle-question text-gray-100 text-4xl"></i>
                        </div>
                    </div>

                    <div class="flex justify-between items-center bg-gray-100 h-40 w-full rounded shadow-2xl">
                        <div class="p-4 space-y-2">
                            <h5 class="font-bold text-lg text-orange-700">ON GOING APPLICATIONS</h5>
                            <h6 class="font-bold text-4xl text-orange-700">{{$ongoingCount}}</h6>
                        </div>
                        <div class="h-full p-4 flex items-center bg-orange-500">
                            <i class="fa-solid fa-file-signature text-gray-100 text-4xl"></i>
                        </div>
                    </div>

                    <div class="flex justify-between items-center bg-gray-100 h-40 w-full rounded shadow-2xl">
                        <div class="p-4 space-y-2">
                            <h5 class="font-bold text-lg text-green-700">APPROVED APPLICATIONS</h5>
                            <h6 class="font-bold text-4xl text-green-700">{{$approvedCount}}</h6>
                        </div>
                        <div class="h-full p-4 flex items-center bg-green-500">
                            <i class="fa-solid fa-file-circle-check text-gray-100 text-4xl"></i>
                        </div>
                    </div>

                    <div class="flex justify-between items-center bg-gray-100 h-40 w-full rounded shadow-2xl">
                        <div class="p-4 space-y-2">
                            <h5 class="font-bold text-lg text-cyan-700">ACCOUNTS</h5>
                            <h6 class="font-bold text-4xl text-cyan-700">{{$userCount}}</h6>
                        </div>
                        <div class="h-full p-4 flex items-center bg-cyan-500">
                            <i class="fa-solid fa-user-group text-gray-100 text-3xl"></i>
                        </div>
                    </div>

                </div>
                
                <div class="col-span-2 border-l-2 border-dashed w-full px-12 space-y-5">
                    <h2 class="font-bold text-xl text-hau">LATEST APPLICATIONS</h2>
                    @forelse ($weekApplications as $application)
                      
                        <div class="w-full p-2 bg-gray-100 rounded shadow-2xl">
                            <div class="flex justify-end">
                                <span class="py-0.5 px-1.5 font-bold text-hau rounded-lg">
                                    {{date('F d, Y', strtotime($application->created_at))}}
                                </span>
                            </div>
                            <div class="flex justify-start items-center gap-x-4">
                                <img src="{{asset('uploads/' . $application->user->avatar)}}" alt="" class="w-24 object-cover rounded">
                                <div class="">
                                    <p class="font-bold text-lg">
                                        {{$application->user->first_name . ' ' . $application->user->last_name}}
                                    </p>
                                    <span class="font-bold text-sm text-gray-700">{{$application->user->email}}</span>
                                </div>
                            </div>
                            <div class="pt-3 flex flex-col justify-center items-start gap-y-2">
                                <span class="font-bold text-lg ">{{$application->user->faculty}}</span>
                                <span class="font-bold text-lg ">{{$application->user->department}}</span>
                            </div>
                            
                        </div>

                        
                        
                        
                    @empty
                        <p class="font-bold text-2xl">
                            <i class="fa-solid fa-file-circle-xmark text-2xl text-red-700 mr-2"></i>NO APPLICATION
                        </p>
                    @endforelse 
                </div>

            </div>
        </div>

    </x-admin.navigation>
</x-admin.layout>