<x-faculty.layout>
    <x-faculty.navigation>
        @if(session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
                <p class="text-lg tracking-widest">
                    <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
                </p>
            </div>
        @endif
        
        <section>
            <div class="pt-12 h-screen w-full">
                <div class="h-full px-5 grid grid-cols-1 md:grid-cols-3 gap-x-8 justify-items-center">

                    {{-- UNDERGRAD --}}
                    @include('partials.faculty._undergrad')
                    
                    {{-- MASTERS --}}
                    @include('partials.faculty._master')

                    {{-- PHD --}}
                    @include('partials.faculty._phd')
                    
                </div>
            </div>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>