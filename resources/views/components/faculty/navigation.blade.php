<section>
    <div class="h-screen w-52 fixed flex flex-col justify-between bg-hau text-white">
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
                <a href="{{route('home')}}" class="{{ Route::is('home') ? 'border-l-4 text-white' : 'text-white/60 '}} w-full py-3 font-bold text-white transition ease-in-out hover:scale-110 hover:bg-white hover:text-gray-900 duration-300">
                    <span class="text-sm tracking-tighter">Dashboard</span>
                </a>
                <a href="{{route('profile.show', auth()->user()->id)}}" class="{{ Route::is('profile.show') ? 'border-l-4 text-white' : 'text-white/60 '}} w-full py-3 font-bold transition ease-in-out hover:scale-110 hover:bg-white hover:text-gray-900 duration-300">
                    <span class="text-sm tracking-tighter">My Information</span>
                </a>
                <a href="{{route('educbg')}}" class="{{ Route::is('educbg') ? 'border-l-4 text-white' : 'text-white/60 '}} w-full py-3 font-bold transition ease-in-out hover:scale-110 hover:bg-white hover:text-gray-900 duration-300">
                    <span class="text-sm tracking-tighter">Educational Background</span>
                </a>
                <a href="" class="w-full py-3 font-bold text-white/60 transition ease-in-out hover:scale-110 hover:bg-white hover:text-gray-900 duration-300">
                    <span class="text-sm tracking-tighter">PRC License</span>
                </a>
                <a href="" class="w-full py-3 font-bold text-white/60 transition ease-in-out hover:scale-110 hover:bg-white hover:text-gray-900 duration-300">
                    <span class="text-sm tracking-tighter">Membership in Professional Organization</span>
                </a>
                <a href="" class="w-full py-3 font-bold text-white/60 transition ease-in-out hover:scale-110 hover:bg-white hover:text-gray-900 duration-300">
                    <span class="text-sm tracking-tighter">Trainings/Seminars/Webinars</span>
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
        {{ $slot }}
    </div>
</section>