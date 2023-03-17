<x-faculty.layout>
    <x-faculty.navigation>
        
        <section>
            <div class="h-screen w-full pt-20">
                
                    <form method="POST" action="{{route('undergrad.store')}}" enctype="multipart/form-data" class="pt-10 mx-5 h-full flex flex-col items-center gap-y-4">
                    @csrf
                        <p class="uppercase text-xl tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-plus mr-2"></i>Add</span> Undergrad Information</p>
                        <div class="w-1/2 p-10 border-t-2 border-hau rounded-b-lg shadow-2xl space-y-5">
                       
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
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Upload your diploma</label>
                                <input name="diploma" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                                @error('diploma')
                                    <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Upload your research/thesis</label>
                                <input name="research" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                                @error('research')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-5 flex justify-center gap-x-4">
                                <a href="{{route('edubg')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-400 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-500 duration-300">
                                    <i class="fa-regular fa-circle-xmark mr-1"></i>Cancel
                                </a>
                                <button class="py-1.5 px-4 text-xl text-white tracking-widest bg-green-600 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-700 duration-300">
                                    <i class="fa-regular fa-circle-check mr-1"></i>Save
                                </button>
                            </div>
                        </div>
                        
                    </form>
            </div>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>