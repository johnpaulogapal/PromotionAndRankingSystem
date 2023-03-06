<x-auth.layout>

    <div class="p-10 md:p-48 h-screen w-full grid grid-cols-1 md:grid-cols-2 gap-x-8 justify-items-center content-center">
        <div class="hidden md:flex flex-col justify-center items-center">
            <img src="{{asset('images/hau-logo.png')}}" alt="" class="w-full object-cover">
            <h1 class="font-bold text-4xl tracking-widest">Holy Angel University</h1>
        </div>
        <div class="flex flex-col justify-center items-center">
            <div class="py-10 px-5 border-t-4 border-color-hau rounded-b shadow-2xl space-y-8">
                <div class="flex flex-col font-bold text-xl text-center text-hau tracking-widest">
                    <span>Faculty Ranking</span>
                    <span class="text-sm">and</span>
                    <span> Promotion Portal</span>
                </div>
                
                {{-- Login Form --}}
                <form method="POST" action="{{route('authenticate')}}" class="w-full space-y-4">
                @csrf
                    
                    {{-- Username --}}
                    <div class="space-y-1">
                        <i class="fa-solid fa-user-shield text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Username</span>
                        <input name="email" type="text" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                        @error('email')
                            <p class="text-xs text-red-700">{{ $message}}</p>
                        @enderror
                    </div>
                    {{-- Password --}}
                    <div class="space-y-1">
                        <i class="fa-solid fa-lock text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Password</span>
                        <input name="password" type="password" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                    </div>
                    
                    <div class="flex justify-center">
                        <button class="py-1 px-2 bg-hau font-bold text-gray-100 text-sm tracking-wider rounded transition ease-in-out delay-150 hover:scale-125 hover:text-hau focus:outline-gray-700 duration-300">LOG IN</button>
                    </div>
                </form>
                
                {{-- Terms --}}
                <div class="flex flex-col items-center text-gray-700 text-xs tracking-wide">
                    <span>by logging in to our site.</span>  
                    <span>You agree to our</span>
                    <span>
                        <a href="" class="text-hau transition ease-in-out delay-150 hover:text-red-500 duration-300">Terms and Conditions</a>
                        and
                        <a href="" class="text-hau transition ease-in-out delay-150 hover:text-red-500 duration-300">Privacy Policy.</a>
                    </span>
                </div>
                
            </div>
        </div>
    </div>

</x-auth.layout>