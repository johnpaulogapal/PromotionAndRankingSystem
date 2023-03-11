<x-faculty.layout>
    <x-faculty.navigation>
        
        <section class="h-screen w-full pt-20 p-8">
            <div class="flex flex-col jusfity-center items-center gap-y-4">
                <p class="uppercase text-xl text-center tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-plus mr-2"></i>Add</span> Trainings/Seminars/Webinars Information</p>
            </div>
            <form method="POST" action="{{route('training.store')}}" class="pt-5 grid justify-items-center content-start gap-y-8">
            @csrf
                <div class="w-full py-5 px-10 border-t-4 border-hau rounded-b shadow-2xl">
                    <div class="grid grid-cols-7 justify-items-center content-center gap-x-4">
                        <div class="flex flex-col justify-start gy-1">
                            <b class="text-hau text-sm tracking-wide">From</b>
                            <input name="from" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            @error('from')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">To</b>
                            <input name="to" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            @error('to')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Title</b>
                            <input name="title" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Speaker</b>
                            <input name="speaker" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            @error('speaker')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Venue</b>
                            <input name="venue" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            @error('venue')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Institution</b>
                            <input name="institution" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            @error('institution')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start">
                            <b class="text-hau text-sm tracking-wide">Upload</b>
                            {{-- <input name="date_hired" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau"> --}}
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex justify-center gap-x-4">
                    <a href="{{route('training.index')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-red-600 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-700 duration-300">
                        <i class="fa-regular fa-circle-xmark mr-1"></i>Cancel
                    </a>
                    <button class="py-1.5 px-4 text-xl text-white tracking-widest bg-green-600 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-700 duration-300">
                        <i class="fa-regular fa-circle-check mr-1"></i>Save
                    </button>
                </div>
                <hr class="w-full border-t-2 border-dashed border-gray-200">
                
            </form>
        </section>
        
    </x-faculty.navigation>
</x-faculty.layout>