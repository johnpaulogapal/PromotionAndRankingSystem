<x-faculty.layout>
    <x-faculty.navigation>
        @if(session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
                <p class="text-lg tracking-widest">
                    <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
                </p>
            </div>
        @endif
        
        <div class="h-screen flex flex-col justify-center items-center">
            <div class="bg-white py-8 px-12 border-t-4 border-color-hau rounded-b shadow-2xl space-y-8">
                <div class="flex flex-col items-center text-hau gap-y-4">
                    <p class="font-bold uppercase text-center text-xl tracking-widest">Faculty Promotion and Ranking System</p> 
                    <p class="font-bold uppercase text-center text-xl tracking-widest">Create an Account</p>   
                </div>
                
                {{-- Login Form --}}
                <form method="POST" action="{{route('change.password')}}" class="w-full px-10 space-y-8">
                @csrf
                    

                    {{-- Password --}}
                    <div class="space-y-1">
                        <i class="fa-solid fa-lock text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Current Password</span>
                        <input name="current_password" type="password" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                        @error('current_password')
                            <p class="font-bold text-red-700">{{ $message}}</p>
                        @enderror
                    </div>

                    <div class="space-y-1">
                        <i class="fa-solid fa-lock text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">New Password</span>
                        <input name="new_password" type="password" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                        @error('new_password')
                            <p class="font-bold text-red-700">{{ $message}}</p>
                        @enderror
                    </div>

                    <div class="space-y-1">
                        <i class="fa-solid fa-lock text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Confirm New Password</span>
                        <input name="confirm_password" type="password" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                        @error('confirm_password')
                            <p class="font-bold text-red-700">{{ $message}}</p>
                        @enderror
                    </div>
                    
                    <div class="flex justify-center gap-4">
                        <button class="py-1 px-2 text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                            <i class="fa-solid fa-check mr-1"></i>Confirm
                        </button>
                    </div>
                </form>
                
                
            </div>
        </div>
        

    </x-faculty.navigation>
</x-faculty.layout>