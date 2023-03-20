<x-admin.layout>
    <x-admin.navigation>
       
        <div class="pt-24 pb-5 px-10">
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
                                <p class="font-bold tracking-widest">Email: {{$application->email}}</p>
                                <p class="font-bold tracking-widest">Full Name: {{$application->first_name . ' ' . $application->last_name}}</p>
                                <p class="font-bold tracking-widest">Submitted on: {{date('F d, Y', strtotime($application->created_at))}}</p>
                            </div>
                        </div>
                    </a>
                    @empty
                        <p class="font-bold text-2xl tracking-widest">No Application</p>
                    @endforelse   
                </div>
                
            </div>
        </div>

    </x-admin.navigation>
</x-admin.layout>