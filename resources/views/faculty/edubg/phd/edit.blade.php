<x-faculty.layout>
    <x-faculty.navigation>
        
        <section>
            <div class="h-screen w-full pt-20">
                
                    <form method="POST" action="{{route('phd.update', $phd->id)}}" enctype="multipart/form-data"  class="pt-10 mx-5 h-full flex flex-col items-center gap-y-4">
                    @csrf
                    @method('PUT')

                        @if($phd->status == 'resubmit')
                        <div class="p-2 my-1 flex flex-col gap-1 text-white bg-orange-700 rounded">
                            <span><i class="fa-regular fa-comment mr-1"></i> Comment</span>
                            <p class="font-bold uppercase text-sm">{{$phd->comment}}</p>
                        </div>
                        @endif

                        <p class="uppercase text-xl tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</span> PHD Information</p>
                        <div class="w-full md:w-1/2 py-5 px-10 border-t-2 border-hau rounded-b-lg shadow-2xl space-y-5">
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">School</b>
                                <input name="school" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$phd->school}}">
                                @error('school')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">Course</b>
                                <input name="course" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$phd->course}}">
                                @error('course')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col justify-start gap-y-1">
                                <b class="text-hau text-sm tracking-wide">Date of Graduation</b>
                                <input name="graduation_date" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$phd->graduation_date}}">
                                @error('graduation_date')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            
                            <div class="flex flex-col md:flex-row justify-between">
                                <div class="flex flex-col justify-center gap-1">
                                    <a href="{{asset('uploads/' . $phd->tor)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                                       Download TOR
                                    </a>
                                    <input name="tor" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                                    @error('tor')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                                
                              
                            </div>
                            
                        </div>
                        <div class="m-5 flex justify-center gap-x-4">
                            <a href="{{route('edubg')}}" class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                                <i class="fa-solid fa-xmark mr-1"></i>Cancel
                            </a>
                            <button class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                                <i class="fa-solid fa-check mr-1"></i>Save
                            </button>
                        </div>
                        
                    </form>
            </div>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>