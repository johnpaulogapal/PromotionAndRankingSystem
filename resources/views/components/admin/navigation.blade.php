<section>
    <div class="h-screen w-60 fixed flex flex-col justify-between bg-hau text-white z-50">
        <div class="space-y-4">
            <div class="p-5 flex flex-col items-center gap-y-2">
                <a href="">
                    <img src="{{asset('images/hau-logo.png')}}" alt="" class="w-16">
                </a>
                <span class="font-bold uppercase text-center text-sm tracking-widest">Faculty Ranking and Promotion Portal</span>
            </div>

            <div class="flex flex-col items-center gap-y-1">
                <a href="{{route('admin.index')}}" class="pl-2 {{ Route::is('admin.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900 '}} w-full py-3 font-bold text-white transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-chart-pie mr-2"></i>Dashboard</span>
                </a>
                <a href="{{route('pending.index')}}" class="pl-2 {{ Route::is('pending.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900 '}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-file-circle-question mr-2"></i>Pending Applications</span>
                </a>
                <a href="{{route('received.index')}}" class="pl-2 {{ Route::is('received.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900 '}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-file-arrow-down mr-2"></i>Received Applications</span>
                </a>
                <a href="{{route('approved.index')}}" class="pl-2 {{ Route::is('approved.index') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900 '}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-file-circle-check mr-2"></i>Approved Applications</span>
                </a>
                <a href="{{route('admin.basicEd')}}" class="pl-2 {{ Route::is('admin.basicEd') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-list-ol mr-2"></i>Basic Education Ranking</span>
                </a>
                <a href="{{route('admin.college')}}" class="pl-2 {{ Route::is('admin.college') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-list-ol mr-2"></i>College Ranking</span>
                </a>
                <a href="{{route('admin.account')}}" class="pl-2 {{ Route::is('admin.account') ? 'border-l-4 text-white hover:text-white/60 hover:border-white/60' : 'text-white/60 hover:bg-white hover:text-gray-900'}} w-full py-3 font-bold transition ease-in-out duration-300">
                    <span class="tracking-wider"><i class="fa-solid fa-users mr-2"></i>Accounts</span>
                </a>
            </div>
        </div>
     
        <form method="POST" action="{{route('logout')}}" class="p-5 text-center">
        @csrf
            <button class="text-white/50 transition ease-in-out hover:scale-110 hover:text-white duration-300"><i class="fa-solid fa-power-off mr-1"></i>Logout</button>
        </form>
    </div>

    {{-- Main Content --}}
    <div class="pl-60 ">
        <div class="w-full absolute top-0 right-0 py-2 px-3 my-2 mr-8 flex justify-end items-center border-b-4 border-dashed border-gray-200">
            <span class="uppercase text-xl tracking-widest">
                <i class="fa-regular fa-user mr-1"></i>
                Admin User: {{auth()->user()->email}}
            </span>  
        </div>
        
        {{ $slot }}
    </div>
</section>