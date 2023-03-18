<x-faculty.layout>
    <x-faculty.navigation>
        
        <section class="h-screen w-full pt-20 p-8">
            <div class="flex flex-col jusfity-center items-center gap-y-4">
                <p class="uppercase text-xl text-center tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-plus mr-2"></i>Add</span> Trainings/Seminars/Webinars Information</p>
            </div>
            <form method="POST" action="{{route('training.update', $training->id)}}" enctype="multipart/form-data" class="pt-5 grid justify-items-center content-start gap-y-8">
            @csrf
            @method('PUT')
                <div class="w-3/4 py-5 px-10 border-t-4 border-hau rounded-b shadow-2xl">
                    <div class="grid grid-cols-3 gap-8">
                        <div class="flex flex-col justify-start gy-1">
                            <b class="text-hau text-sm tracking-wide">From</b>
                            <input name="from" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$training->from}}">
                            @error('from')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">To</b>
                            <input name="to" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$training->to}}">
                            @error('to')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-start-1 flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Title</b>
                            <input name="title" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$training->title}}">
                            @error('title')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Speaker</b>
                            <input name="speaker" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$training->speaker}}">
                            @error('speaker')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Venue</b>
                            <input name="venue" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$training->venue}}">
                            @error('venue')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Institution</b>
                            <input name="institution" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$training->institution}}">
                            @error('institution')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 flex flex-col justify-center gap-1">
                            <a href="{{asset('uploads/' . $training->certificate)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                                Download Certificate
                            </a>
                            <input name="certificate" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                            @error('certificate')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex justify-center gap-x-4">
                    <a href="{{route('training.index')}}" class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                        <i class="fa-solid fa-xmark mr-1"></i>Cancel
                    </a>
                    <button class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                        <i class="fa-solid fa-check mr-1"></i>Save
                    </button>
                </div>
                <hr class="w-full border-t-2 border-dashed border-gray-200">
                
            </form>
        </section>
        
    </x-faculty.navigation>
</x-faculty.layout>