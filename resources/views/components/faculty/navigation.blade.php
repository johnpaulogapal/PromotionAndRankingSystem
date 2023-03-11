<section>
    <div class="h-screen w-60 fixed flex flex-col justify-between bg-hau text-white z-50">
        <div class="space-y-4">
            <div class="p-5 flex flex-col items-center gap-y-2">
                <a href="">
                    <img src="{{asset('images/hau-logo.png')}}" alt="" class="w-10">
                </a>
                <span class="text-center text-sm tracking-widest">Ranking and Promotion Portal</span>
            </div>
        @if (Auth::user()->first_name == '')
            </div>
        @else
            <div class="flex flex-col items-center text-center">
                <a href="{{route('home')}}" class="{{ Route::is('home') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:scale-110 hover:bg-white hover:text-gray-900 '}} w-full py-3 font-bold text-white transition ease-in-out duration-300">
                    <span class="text-sm">Dashboard</span>
                </a>
                <a href="{{route('profile.show', auth()->user()->id)}}" class="{{ Route::is('profile.show') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:scale-110 hover:bg-white hover:text-gray-900 '}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="text-sm">My Information</span>
                </a>
                <a href="{{route('edubg')}}" class="{{ Route::is('edubg') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:scale-110 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="text-sm">Educational Background</span>
                </a>
                <a href="{{route('prc.index')}}" class="{{ Route::is('prc.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:scale-110 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="text-sm">PRC License</span>
                </a>
                <a href="{{route('mpo.index')}}" class="{{ Route::is('mpo.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:scale-110 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="text-sm">Membership in Professional Organization</span>
                </a>
                <a href="{{route('training.index')}}" class="{{ Route::is('training.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:scale-110 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="text-sm">Trainings/Seminars/Webinars</span>
                </a>
            </div>
        </div>
       
        @endif    
        <form method="POST" action="{{route('logout')}}" class="p-5 text-center">
        @csrf
            <button class="text-white/50 transition ease-in-out hover:scale-110 hover:text-white duration-300"><i class="fa-solid fa-power-off mr-1"></i>Logout</button>
        </form>
    </div>

    {{-- Main Content --}}
    <div class="pl-60">
        <div class="w-full absolute top-0 right-0 flex justify-end items-center border-b-4 border-dashed border-gray-200">
            <a href="{{route('application.index')}}" class="py-2 px-3 my-2 mr-8 rounded transition ease-in-out hover:scale-110 hover:text-gray-900 duration-300">
         
                <span class="uppercase text-xl tracking-widest">
                    <i class="fa-regular fa-bell mr-1"></i>
                    View Applications Status
                    <i class="fa-solid fa-arrow-right ml-1"></i>
                </span>
          
            </a>
        </div>
        
        {{ $slot }}
    </div>
</section>