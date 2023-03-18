<x-faculty.layout>
    <x-faculty.navigation>
        
        <section class="h-screen w-full pt-20 p-8">
            <div class="flex flex-col jusfity-center items-center gap-y-4">
                <p class="uppercase text-xl text-center tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</span> PRC License Information</p>
            </div>
            <form method="POST" action="{{route('prc.update', $prc->id)}}" enctype="multipart/form-data" class="pt-5 grid justify-items-center content-start gap-y-8">
            @csrf
            @method('PUT')
                <div class="w-full p-10 border-t-4 border-hau grid grid-cols-3 gap-4 rounded-b shadow-2xl">
                    <div class="col-span-2 grid grid-cols-2 gap-x-4">
                        <img src="{{asset('uploads/' . $prc->prc_front)}}" alt="" class="aspect-video">
                        <img src="{{asset('uploads/' . $prc->prc_back)}}" alt="" class="aspect-video">
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider">Update the front of your Prc License</label>
                            <input name="prc_front" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                            @error('prc_front')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider">Update the back of your Prc License</label>
                            <input name="prc_back" type="file"  class="py-0.5 px-2 aret-hau outline-hau">
                            @error('prc_back')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-rows-2 gap-y-4">
                        <div class="flex flex-col justify-start gap-y-1">
                            <b class="text-hau text-sm tracking-wide">License Number</b>
                            <input name="prc_num" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$prc->prc_num}}">
                            @error('prc_num')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start gap-y-1">
                            <b class="text-hau text-sm tracking-wide">Validity</b>
                            <input name="validity" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$prc->validity}}">
                            @error('validity')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>  
                        <div class="flex items-center justify-center gap-x-4">
                            <a href="{{route('prc.index')}}" class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                                <i class="fa-solid fa-xmark mr-1"></i>Cancel
                            </a>
                            <button class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                                <i class="fa-solid fa-check mr-1"></i>Save
                            </button>
                        </div>
                    </div>
                </div>
               
                <hr class="w-full border-t-2 border-dashed border-gray-200">
                
            </form>
        </section>
        
    </x-faculty.navigation>
</x-faculty.layout>