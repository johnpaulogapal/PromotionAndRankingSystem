<x-faculty.layout>
    <x-faculty.navigation>
        
        <section class="h-screen w-full p-8">
            <div class="flex flex-col jusfity-center items-center gap-y-4">
                <p class="uppercase text-xl text-center tracking-widest"><span class="py-1 px-2 bg-hau text-white rounded shadow-lg"><i class="fa-solid fa-pen-to-square mr-2"></i>Edit</span> PRC License Information</p>
            </div>
            <form method="POST" action="{{route('prc.update', $prc->id)}}" class="pt-5 grid justify-items-center content-start gap-y-8">
            @csrf
            @method('PUT')
                <div class="w-1/2 p-10 border-t-4 border-hau grid grid-cols-2 gap-4 rounded-b shadow-2xl">
                    <div class="justify-self-center flex items-center">
                        qwe
                    </div>
                    <div class="grid grid-rows-2 gap-y-4">
                        <div class="flex flex-col justify-start gap-y-1">
                            <b class="text-hau text-sm tracking-wide">License Number</b>
                            <input name="prc_num" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$prc->prc_num}}">
                            @error('prc_num')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col justify-start gap-y-1">
                            <b class="text-hau text-sm tracking-wide">Validity</b>
                            <input name="validity" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{$prc->validity}}">
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