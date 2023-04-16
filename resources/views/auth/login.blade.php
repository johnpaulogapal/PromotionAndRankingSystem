<x-auth.layout>
    @if(session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
            <p class="text-lg tracking-widest">
                <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
            </p>
        </div>
    @endif
    <div class="bg-gray-200 p-10 md:p-48 h-screen w-full grid grid-cols-1 md:grid-cols-2 gap-x-8 justify-items-center content-center">
        <div class="hidden md:flex flex-col justify-center items-center">
            <img src="{{asset('images/hau-logo.png')}}" alt="" class="w-full object-cover">
            <h1 class="font-bold text-4xl tracking-widest">Holy Angel University</h1>
        </div>
        <div class="w-3/5 flex flex-col justify-center items-center">
            <div class="bg-white py-8 px-6 border-t-4 border-color-hau rounded-b shadow-2xl space-y-8">
                <div class="flex flex-col items-center text-hau gap-y-4">
                    <p class="font-bold uppercase text-center text-sm tracking-widest">Welcome to our</p>
                    <p class="font-bold uppercase text-center text-xl tracking-widest">Faculty Promotion and Ranking Portal</p>    
                </div>
                
                {{-- Login Form --}}
                <form method="POST" action="{{route('authenticate')}}" class="w-full space-y-8">
                @csrf
                    
                    {{-- Username --}}
                    <div class="space-y-1">
                        <i class="fa-solid fa-user-shield text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Email</span>
                        <input name="email" type="text" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                        @error('email')
                            <p class="font-bold text-red-700">{{ $message}}</p>
                        @enderror
                    </div>
                    {{-- Password --}}
                    <div class="space-y-1">
                        <i class="fa-solid fa-lock text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Password</span>
                        <input name="password" type="password" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                    </div>
                    
                    <div class="flex justify-center">
                        <button class="py-1 px-2 bg-hau font-bold text-gray-100 text-sm tracking-wider rounded transition ease-in-out delay-150 hover:scale-125 hover:text-hau focus:outline-gray-700 duration-300">SIGN IN</button>
                    </div>
                </form>
                
                {{-- Terms --}}
                <div class="flex flex-col items-center text-gray-700 text-sm">
                    <span>by logging in to our site.</span>  
                    <span>You agree to our</span>
                    <span>
                        <a href="" class="text-hau transition ease-in-out delay-150 hover:text-red-500 duration-300">Terms and Conditions</a>
                        and
                        <a href="{{route('privacy')}}" class="text-hau transition ease-in-out delay-150 hover:text-red-500 duration-300">Privacy Policy.</a>
                    </span>
                </div>
                
            </div>
        </div>
    </div>

</x-auth.layout>