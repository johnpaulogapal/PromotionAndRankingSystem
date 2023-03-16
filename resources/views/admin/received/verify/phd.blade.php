<x-admin.layout>
    <x-admin.navigation>
    <div class="pt-24 p-10 h-screen w-full grid place-items-center content-start gap-8">
        <p class="font-bold uppercase text-center text-xl tracking-widest mb-2">
            PHD Information of {{$phd->user->first_name . " " . $phd->user->last_name}}
        </p>
        <div class="w-1/3 mb-2 p-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-4">
            <div class="flex flex-col justify-start">
                <b class="text-hau tracking-wide">School</b>
                <p class="text-hau tracking-widest">{{$phd->school}}</p>
            </div>
            <div class="flex flex-col justify-start">
                <b class="text-hau tracking-wide">Course</b>
                <p class="text-hau tracking-widest">{{$phd->course}}</p>
            </div>
            <div class="flex flex-col justify-start">
                <b class="text-hau tracking-wide">Graduation Date</b>
                <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($phd->graduation_date))}}</p>
            </div>
            
            <div class="">
                <b class="text-hau tracking-wide">Diploma</b>
                <a href="{{asset('uploads/' . $phd->diploma)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                    Download
                </a>
            </div>
            
            <div class="">
                <b class="text-hau tracking-wide">Research</b>
                <a href="{{asset('uploads/' . $phd->research)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                    Download
                </a>
            </div>

            <div class="border-t border-hau flex justify-end pt-5 gap-x-4">
                <a href="{{route('received.show', $phd->user_id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                    <i class="fa-solid fa-arrow-left mr-1"></i>Back
                </a>
            </div>
        </div>

    </div>
    </x-admin.navigation>
</x-admin.layout>