<x-admin.layout>
    <x-admin.navigation>

        <div class="pt-24 p-10 h-screen w-full grid place-items-center content-start gap-8">
            <p class="font-bold uppercase text-center text-xl tracking-widest mb-2">Application Information of {{$application->user->first_name . " " . $application->user->last_name}}</p>
            <div class="px-5 grid grid-cols-2 gap-8 py-5 px-12  border-t-4 border-hau rounded-b-lg shadow-2xl">
                <div class="flex flex-col justify-start gap-1">
                    <b class="text-hau text-sm tracking-wide">Date Hired</b>
                    <p class="text-hau text-lg tracking-widest">  {{date('F d, Y', strtotime($application->date_hired))}}</p>
                </div>
                <div class="flex flex-col justify-start gap-1">
                    <b class="text-hau text-sm tracking-wide">Current Rank</b>
                    <p class="text-hau text-lg tracking-widest">  {{$application->current_rank}}</p>
                </div>
                <div class="flex flex-col justify-start gap-1">
                    <b class="text-hau text-sm tracking-wide">Date of Last Promotion</b>
                    <p class="text-hau text-lg tracking-widest">  {{date('F d, Y', strtotime($application->date_last_prom))}}</p>
                </div>
                <div class="flex flex-col justify-start gap-1">
                    <b class="text-hau text-sm tracking-wide">Proposed Rank</b>
                    <p class="text-hau text-lg tracking-widest">  {{$application->proposed_rank}}</p>
                </div>
            </div>
            <div class="flex justify-center items-center gap-x-4">
                <a href="{{route('received.show', $application->user_id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                    <i class="fa-solid fa-arrow-left mr-1"></i>Back
                </a>
                <a href="" class="py-1.5 px-4 text-xl text-white tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-600 duration-300">
                    <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                </a>
            </div>
        </div>

    </x-admin.navigation>
</x-admin.layout>