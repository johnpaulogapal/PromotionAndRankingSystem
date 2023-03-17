<x-admin.layout>
    <x-admin.navigation>
    <div class="pt-24 p-16 h-screen w-full grid place-items-center content-start gap-8">
        <p class="font-bold uppercase text-center text-xl tracking-widest mb-2">
            Membership in Professional Organization Information of {{$mpo->user->first_name . " " . $mpo->user->last_name}}
        </p>
        
        <div class="w-1/2 p-5 border-t-4 border-hau grid grid-cols-2 gap-4 rounded-b shadow-2xl">
            <div class="justify-self-center flex items-center">
                qwe
            </div>
            <div class="grid grid-rows-3 gap-y-4">
                <div class="flex flex-col justify-start">
                    <b class="text-hau text-sm tracking-wide">Organiztion Name</b>
                    <p class="text-hau text-lg tracking-widest">{{$mpo->org_name}}</p>
                </div>
                <div class="flex flex-col justify-start">
                    <b class="text-hau text-sm tracking-wide">Validity</b>
                    <p class="text-hau text-lg tracking-widest">{{date('F d, Y', strtotime($mpo->mpo_num))}}</p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center justify-center gap-x-4">
            <a href="{{route('received.show', $mpo->user_id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                <i class="fa-solid fa-arrow-left mr-1"></i>Back
            </a> 
        </div> 

    </div>
    </x-admin.navigation>
</x-admin.layout>