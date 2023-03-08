<x-faculty.layout>
    <x-faculty.navigation>
        
        @if(session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 8000)" x-show="show" class="fixed m-10 top-0 left-0 bg-gray-100 border-l-4 border-green-700 text-green-700 px-5 py-2 shadow-lg">
                <p class="text-lg tracking-widest">
                    <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
                </p>
            </div>
        @endif

    </x-faculty.navigation>
</x-faculty.layout>