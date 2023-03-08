<x-faculty.layout>
    <x-faculty.navigation>
        @if(session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-100 border-l-4 border-green-700 text-green-700 px-5 py-2 shadow-lg">
                <p class="text-lg tracking-widest">
                    <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
                </p>
            </div>
        @endif
        <section class="h-screen w-full p-8">
            <div class="flex flex-col jusfity-center items-center gap-y-4">
                <p class="uppercase text-xl text-center tracking-widest">Trainings/Seminars/Webinars Information</p>
                <a href="{{route('training.create')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300 mb-5">
                    <i class="fa-solid fa-circle-plus mr-1"></i>Add Info
                </a>
            </div>

            <div class="pt-5 px-10 grid justify-items-center content-start gap-y-8">
                @foreach ($trainings as $training)
                    <div class="w-full py-5 px-10 border-t-4 border-hau rounded-b shadow-2xl">
                        <div class="grid grid-cols-7 justify-items-center content-center gap-x-5">
                            <div class="flex flex-col justify-start">
                                <b class="text-hau text-xs tracking-wide">From</b>
                                <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($training->from))}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="text-hau text-xs tracking-wide">To</b>
                                <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($training->to))}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="text-hau text-xs tracking-wide">Title</b>
                                <p class="text-hau tracking-widest">{{$training->title}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="text-hau text-xs tracking-wide">Speaker</b>
                                <p class="text-hau tracking-widest">{{$training->speaker}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="text-hau text-xs tracking-wide">Venue</b>
                                <p class="text-hau tracking-widest">{{$training->venue}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="text-hau text-xs tracking-wide">Institution</b>
                                <p class="text-hau tracking-widest">{{$training->institution}}</p>
                            </div>
                            <div class="pt-5 justify-self-end align-self-center">
                                <a href="{{route('training.edit', $training->id)}}" class="py-1 px-2 text-white tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-600 duration-300">
                                    <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr class="w-full border-t-2 border-dashed border-gray-200">
                @endforeach
            </div>
        </section>
        
    </x-faculty.navigation>
</x-faculty.layout>