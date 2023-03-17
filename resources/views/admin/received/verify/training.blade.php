<x-admin.layout>
    <x-admin.navigation>
    <div class="pt-24 p-16 h-screen w-full grid place-items-center content-start gap-8">
        <p class="font-bold uppercase text-center text-xl tracking-widest mb-2">
            TRAININGS/SEMINARS/WEBINARS Information of {{$training->user->first_name . " " . $training->user->last_name}}
        </p>
        
        <div class="w-full py-5 px-10 border-t-4 border-hau rounded-b shadow-2xl">
            <div class="grid grid-cols-6 gap-3">
                <div class="p-2 border-l-2 border-dashed border-gray-200 flex flex-col justify-start">
                    <b class="text-hau text-xs tracking-wide">From</b>
                    <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($training->from))}}</p>
                </div>
                <div class="p-2 border-l-2 border-dashed border-gray-200 flex flex-col justify-start">
                    <b class="text-hau text-xs tracking-wide">To</b>
                    <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($training->to))}}</p>
                </div>
                <div class="p-2 border-l-2 border-dashed border-gray-200 flex flex-col justify-start">
                    <b class="text-hau text-xs tracking-wide">Title</b>
                    <p class="text-hau tracking-widest">{{$training->title}}</p>
                </div>
                <div class="p-2 border-l-2 border-dashed border-gray-200 flex flex-col justify-start">
                    <b class="text-hau text-xs tracking-wide">Speaker</b>
                    <p class="text-hau tracking-widest">{{$training->speaker}}</p>
                </div>
                <div class="p-2 border-l-2 border-dashed border-gray-200 flex flex-col justify-start">
                    <b class="text-hau text-xs tracking-wide">Venue</b>
                    <p class="text-hau tracking-widest">{{$training->venue}}</p>
                </div>
                <div class="p-2 border-l-2 border-dashed border-gray-200 flex flex-col justify-start">
                    <b class="text-hau text-xs tracking-wide">Institution</b>
                    <p class="text-hau tracking-widest">{{$training->institution}}</p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center justify-center gap-x-4">
            <a href="{{route('received.show', $training->user_id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                <i class="fa-solid fa-arrow-left mr-1"></i>Back
            </a> 
        </div> 

    </div>
    </x-admin.navigation>
</x-admin.layout>