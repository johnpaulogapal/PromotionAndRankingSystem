<x-admin.layout>
    <x-admin.navigation>
       
        <div class="w-full pt-24 p-24 space-y-8">
            <div class="w-full p-12 border-t-8 border-hau rounded shadow-2xl">
                <h1 class="w-full font-bold uppercase text-2xl text-center tracking-widest">Edit the Evaluation of {{ $user->first_name . ' ' . $user->last_name }}</h1>
                @if($user->user_type == 'basicEd')
                    @include('partials.admin._basicEdEdit')
                @else
                    @include('partials.admin._collegeEdit')
                @endif
            </div>

    </x-admin.layout>
</x-admin.navigation>