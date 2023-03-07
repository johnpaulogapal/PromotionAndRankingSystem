<x-faculty.layout>
    <x-faculty.navigation>
        
        <section>
            <div class="h-screen w-full">
                
                    <div class="pt-10 mx-5 h-full flex flex-col items-center gap-y-4">
                        <p class="uppercase text-xl tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-plus mr-2"></i>Add</span> Masters Information</p>
                        <form method="POST" action="{{route('master.store')}}" class="w-1/2 py-5 px-10 border-t-2 border-hau rounded-b-lg shadow-2xl space-y-5">
                        @csrf
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">School</b>
                                <input name="school" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                @error('school')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">Course</b>
                                <input name="course" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                @error('course')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">Date of Graduation</b>
                                <input name="graduation_date" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                @error('graduation_date')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex justify-end gap-x-4">
                                <a href="{{route('edubg')}}" class="py-1 px-2 text-white tracking-widest bg-red-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-600 duration-300 mb-10">
                                    <i class="fa-regular fa-circle-xmark mr-1"></i>Cancel
                                </a>
                                <button class="py-1 px-2 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300 mb-10">
                                    <i class="fa-regular fa-circle-check mr-1"></i>Save
                                </button>
                            </div>
                        </form>
                    </div>
            </div>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>