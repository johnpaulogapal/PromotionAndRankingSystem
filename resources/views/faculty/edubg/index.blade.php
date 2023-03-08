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
            <div class="h-screen w-full">
                <div class="h-full px-5 grid grid-cols-3 gap-x-8 justify-items-center">

                    {{-- UNDERGRAD --}}
                    <div class="w-full py-10 px-1 h-full flex flex-col items-center gap-y-4 border-dashed border-x-2 border-gray-200">
                        <p class="uppercase text-xl tracking-widest">Undergrad Information</p>
                        <a href="{{route('undergrad.create')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300 mb-5">
                            <i class="fa-solid fa-circle-plus mr-1"></i>Add Info
                        </a>
                        @if ($undergrads->count() == 0)
                            <p class="text-center tracking-widest">Please submit your Undergrad information</p>
                        @else
                            @foreach ($undergrads as $undergrad)
                                <div class="w-full mb-2 p-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-4">
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">School</b>
                                        <p class="text-hau tracking-widest">{{$undergrad->school}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">Course</b>
                                        <p class="text-hau tracking-widest">{{$undergrad->course}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">Date</b>
                                        <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($undergrad->graduation_date))}}</p>
                                    </div>
                                    <div class="pt-5">
                                        <a href="{{route('undergrad.edit', $undergrad->id)}}" class="py-1 px-2 text-white tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-600 duration-300">
                                            <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    
                    {{-- MASTERS --}}
                    <div class="w-full py-10 px-1 h-full flex flex-col items-center gap-y-4 border-dashed border-x-2 border-gray-200">
                        <p class="uppercase text-xl tracking-widest">Masters Information</p>
                        <a href="{{route('master.create')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300 mb-5">
                            <i class="fa-solid fa-circle-plus mr-1"></i>Add Info
                        </a>
                        @if ($masters->count() == 0)
                            <p class="text-center tracking-widest">Please submit your Master information</p>
                        @else
                            @foreach ($masters as $master)
                                <div class="w-full mb-2 p-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-4">
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">School</b>
                                        <p class="text-hau tracking-widest">{{$master->school}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">Course</b>
                                        <p class="text-hau tracking-widest">{{$master->course}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">Date</b>
                                        <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($master->graduation_date))}}</p>
                                    </div>
                                    <div class="pt-5">
                                        <a href="{{route('master.edit', $master->id)}}" class="py-1 px-2 text-white tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-600 duration-300">
                                            <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    {{-- PHD --}}
                    <div class="w-full py-10 px-1 h-full flex flex-col items-center gap-y-4 border-dashed border-x-2 border-gray-200">
                        <p class="uppercase text-xl tracking-widest">PHD Information</p>
                        <a href="{{route('phd.create')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300 mb-5">
                            <i class="fa-solid fa-circle-plus mr-1"></i>Add Info
                        </a>
                        @if ($phds->count() == 0)
                            <p class="text-center tracking-widest">Please submit your PHD information</p>
                        @else
                            @foreach ($phds as $phd)
                                <div class="w-full mb-2 p-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-4">
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">School</b>
                                        <p class="text-hau tracking-widest">{{$phd->school}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">Course</b>
                                        <p class="text-hau tracking-widest">{{$phd->course}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau text-xs tracking-wide">Date</b>
                                        <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($phd->graduation_date))}}</p>
                                    </div>
                                    <div class="pt-5">
                                        <a href="{{route('phd.edit', $phd->id)}}" class="py-1 px-2 text-white tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-600 duration-300">
                                            <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    

                    

                </div>
            </div>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>