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
    <div class="bg-gray-200">
    <div class="pt-24">
        <p class="uppercase text-center text-3xl text-orange-600 tracking-widest">
            <i class="fa-solid fa-gear mr-1"></i>
            Processing
        </p>
        <div class="m-10 p-10 bg-gray-100 rounded-2xl shadow-2xl">
            <div class="grid grid-cols-4 gap-8">
                
                    <div class="flex flex-col justify-between items-center gap-y-2 py-5 px-2 border-t-4 border-hau rounded-b-lg shadow-2xl">
                        <p class="font-bold uppercase text-center text-lg tracking-widest">Personal Info</p>
                        <p class="font-bold">Submitted on: December 25, 1900</p>
                        <form action="">
                            <button href="" class="self-end py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">View</button>
                        </form>
                    </div>
 
            </div>

        </div>
    </div>
    </div>   
        
</x-faculty.layout>