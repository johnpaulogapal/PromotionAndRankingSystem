<x-faculty.layout>
    <div class="w-full absolute top-0 right-0 flex justify-between items-center border-b-4 border-dashed border-gray-300">
        <a href="{{route('home')}}" class="py-2 px-3 my-2 ml-8 rounded transition ease-in-out hover:scale-110 hover:text-gray-900 duration-300">
            <span class="uppercase text-xl tracking-widest">
                <i class="fa-solid fa-arrow-left mr-1"></i>
                Go Back
                <i class="fa-regular fa-user"></i>
            </span>
        </a>
        <div class="mr-8 space-x-8">
            <button href="{{route('home')}}" class="py-2 px-3 my-2 ml-8 rounded transition ease-in-out hover:scale-110 hover:text-gray-900 duration-300">
                <p class="uppercase text-xl tracking-widest">
                    <i class="fa-solid fa-check mr-1"></i>
                    Approved
                    <span class="py-1 px-2 bg-green-300 rounded-lg">3</span>             
                </p>
            </button>
            <button href="{{route('home')}}" class="py-2 px-3 my-2 ml-8 rounded transition ease-in-out hover:scale-110 hover:text-gray-900 duration-300">
                <p class="uppercase text-xl tracking-widest">
                    <i class="fa-solid fa-xmark mr-1"></i>
                    Rejected
                    <span class="py-1 px-2 bg-red-300 rounded-lg">3</span> 
                </p>
            </button>
        </div>
    </div>
    <div class="h-full bg-gray-200">
    <div class="pt-24 h-screen">
        <p class="uppercase text-center text-3xl text-orange-600 tracking-widest">
            <i class="fa-solid fa-gear mr-1"></i>
            Processing
        </p>
        <div class="p-12 w-full grid grid-cols-3 gap-12">

            <div class="p-5 bg-white rounded-2xl shadow-2xl">
                <p class="font-bold uppercase text-center text-lg tracking-widest">Personal Information</p>
                <div class="">
                    asdasdasd
                </div>
            </div>
            
            
            
        </div>
    </div>
    </div>   
        
</x-faculty.layout>