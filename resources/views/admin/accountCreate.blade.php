<x-admin.layout>
    <x-admin.navigation>
        
        <div class="h-screen flex flex-col justify-center items-center">
            <div class="bg-white py-8 px-12 border-t-4 border-color-hau rounded-b shadow-2xl space-y-8">
                <div class="flex flex-col items-center text-hau gap-y-4">
                    <p class="font-bold uppercase text-center text-xl tracking-widest">Faculty Promotion and Ranking System</p> 
                    <p class="font-bold uppercase text-center text-xl tracking-widest">Create an Account</p>   
                </div>
                
                {{-- Login Form --}}
                <form method="POST" action="store" class="w-full px-10 space-y-8">
                @csrf
                    <div class="space-y-1">
                        <i class="fa-solid fa-users-gear text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">User Type</span>
                        <select name="user_type" id="" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300">
                            <option value="basicEd">Basic Education</option>
                            <option value="college">College</option>
                            <option value="admin">Administrator</option>
                        </select>
                        @error('user_type')
                            <p class="font-bold text-red-700">{{ $message}}</p>
                        @enderror
                    </div>
                    
                    {{-- Username --}}
                    <div class="space-y-1">
                        <i class="fa-solid fa-user-shield text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Email</span>
                        <input name="email" type="text" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" value="{{old('email')}}" required>
                        @error('email')
                            <p class="font-bold text-red-700">{{ $message}}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="space-y-1">
                        <i class="fa-solid fa-lock text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Password</span>
                        <input name="password" type="password" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                        @error('password')
                            <p class="font-bold text-red-700">{{ $message}}</p>
                        @enderror
                    </div>

                    <div class="space-y-1">
                        <i class="fa-solid fa-lock text-xl text-hau"></i>
                        <span class="text-hau tracking-widest">Confirm Password</span>
                        <input name="password_confirmation" type="password" class="outline-hau w-full py-1 px-2 font-bold text-gray-700 text-sm border border-gray-500 caret-hau rounded shadow-2xl transition ease-in-out delay-150 hover:scale-110 duration-300" required>
                        @error('password_confirmation')
                            <p class="font-bold text-red-700">{{ $message}}</p>
                        @enderror
                    </div>
                    
                    <div class="flex justify-center gap-4">
                        <a href="{{route('admin.account')}}" class="py-1 px-2 text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                            <i class="fa-solid fa-xmark mr-1"></i>Cancel
                        </a>
                        <button class="py-1 px-2 text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                            <i class="fa-solid fa-check mr-1"></i>Create
                        </button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>

    </x-admin.navigation>
</x-admin.layout>