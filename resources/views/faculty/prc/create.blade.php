<x-faculty.layout>
    <x-faculty.navigation>
        
        <section class="h-screen w-full pt-20 p-8">
            <div class="flex flex-col jusfity-center items-center gap-y-4">
                <p class="uppercase text-xl text-center tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-plus mr-2"></i>Add</span> PRC License Information</p>
            </div>
            <form method="POST" action="{{route('prc.store')}}" enctype="multipart/form-data"  class="pt-5 grid justify-items-center content-start gap-y-8">
            @csrf
                <div class="w-1/2 p-12 border-t-4 border-hau grid grid-cols-2 gap-12 rounded-b shadow-2xl">
                    <div class="grid grid-rows-2 justify-items-center gap-4">
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider">Upload the front of your Prc License</label>
                            <input name="prc_front" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                            @error('prc_front')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider">Upload the back of your Prc License</label>
                            <input name="prc_back" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                            @error('prc_back')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-rows-2 gap-y-4">
                        <div class="flex flex-col justify-start gap-y-1">
                            <b class="text-hau text-sm tracking-wide">License Number</b>
                            <input name="prc_num" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            @error('prc_num')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start gap-y-1">
                            <b class="text-hau text-sm tracking-wide">Validity</b>
                            <input name="validity" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            @error('validity')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>  
                    </div>
                </div>
                <div class="mt-5 flex justify-center gap-x-4">
                    <a href="{{route('prc.index')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-red-600 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-700 duration-300">
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