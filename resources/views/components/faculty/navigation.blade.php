<section>
    <div class="hidden md:flex h-screen w-64 fixed  flex-col justify-between bg-hau text-white z-50">
        <div class="space-y-4">
            <div class="p-5 flex flex-col items-center gap-y-2">
                <a href="">
                    <img src="{{asset('images/hau-logo.png')}}" alt="" class="w-16">
                </a>
                <span class="font-bold uppercase text-center text-sm tracking-widest">Faculty Ranking and Promotion Portal</span>
            </div>
        @if (Auth::user()->first_name == '')
            </div>
        @else
            <div class="flex flex-col items-center gap-y-1">
                <a href="{{route('home')}}" class="pl-2 {{ Route::is('home') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900 '}} w-full py-3 font-bold text-white transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-chart-pie mr-2"></i>Dashboard</span>
                </a>
                <a href="{{route('profile.show', auth()->user()->id)}}" class="pl-2 {{ Route::is('profile.show') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900 '}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-user mr-2"></i>Profile</span>
                </a>
                <a href="{{route('edubg')}}" class="pl-2 {{ Route::is('edubg') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-graduation-cap mr-2"></i>Educational Background</span>
                </a>
                <a href="{{route('prc.index')}}" class="pl-2 {{ Route::is('prc.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-id-card mr-2"></i>PRC License</span>
                </a>
                <a href="{{route('mpo.index')}}" class="pl-2 {{ Route::is('mpo.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-sitemap mr-2"></i>Membership in Professional Organization</span>
                </a>
                <a href="{{route('training.index')}}" class="pl-2 {{ Route::is('training.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-chalkboard-user mr-2"></i>Trainings/Seminars/ Webinars</span>
                </a>
                <a href="{{route('show.password')}}" class="pl-2 {{ Route::is('show.password') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-lock mr-2"></i>Change Password</span>
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
    <div class="pl-0 md:pl-64">
        <div class="w-full absolute top-0 right-0 flex justify-end items-center border-b-4 border-dashed border-gray-200">
            
            <div class="hidden md:flex w-full pl-60 py-3  justify-between">
                <h5 class="ml-12 uppercase text-lg tracking-widest">
                    <span class="font-bold">User:</span> {{auth()->user()->first_name . " " . auth()->user()->last_name}}                  
                 </h5>
                 <h5 class="ml-12 uppercase text-lg tracking-widest">
                    <span class="font-bold">Application No.</span> {{auth()->user()->application->id}}                  
                 </h5>
                 <h5 class="mr-12 uppercase text-lg tracking-widest">
                     <span class="font-bold">Date:</span> {{date('D - F d, Y', strtotime(now()))}}
                  </h5>
            </div>
               
            
        </div>
        
        {{ $slot }}
    </div>
</section>