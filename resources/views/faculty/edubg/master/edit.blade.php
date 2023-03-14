<x-faculty.layout>
    <x-faculty.navigation>
        
        <section>
            <div class="h-screen w-full pt-20">
                
                    <div class="pt-10 mx-5 h-full flex flex-col items-center gap-y-4">
                        <p class="uppercase text-xl tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</span> Masters Information</p>
                        <form method="POST" action="{{route('master.update', $master->id)}}" enctype="multipart/form-data" class="w-1/2 py-5 px-10 border-t-2 border-hau rounded-b-lg shadow-2xl space-y-5">
                        @csrf
                        @method('PUT')
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">School</b>
                                <input name="school" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$master->school}}">
                                @error('school')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">Course</b>
                                <input name="course" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$master->course}}">
                                @error('course')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">Date of Graduation</b>
                                <input name="graduation_date" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$master->graduation_date}}">
                                @error('graduation_date')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex items-center gap-x-2">
                                <a href="{{asset('uploads/' . $master->diploma)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                                    Download
                                </a>
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Update your diploma</label>
                                    <input name="diploma" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                                    @error('diploma')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                                
                            <div class="flex items-center gap-x-2">
                                <a href="{{asset('uploads/' . $master->research)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                                    Download
                                </a>
                                <div class="flex flex-col justify-center gap-1">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Update your research</label>
                                    <input name="research" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                                    @error('research')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-center gap-x-4">
                                <a href="{{route('edubg')}}" class="py-1.5 px-4 text-white text-xl tracking-widest bg-gray-400 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-500 duration-300 mb-10">
                                    <i class="fa-regular fa-circle-xmark mr-1"></i>Cancel
                                </a>
                                <button class="py-1.5 px-4 text-white text-xl tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300 mb-10">
                                    <i class="fa-regular fa-circle-check mr-1"></i>Save
                                </button>
                            </div>
                        </form>
                    </div>
            </div>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>