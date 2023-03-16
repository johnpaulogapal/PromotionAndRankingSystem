<x-admin.layout>
    <x-admin.navigation>

        <div class="pt-24 p-10 h-screen w-full grid place-items-center content-start gap-8">
            <div class="py-10 px-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-5">
                <div class="grid grid-cols-4 gap-8">
                    <div class="flex flex-col justify-start gap-1">
                        <img src="{{asset('uploads/' . $user->avatar)}}" alt="" class="h-60 w-60 object-cover border-2 border-hau">
                    </div>
                    <div class="col-span-3 grid grid-cols-3 gap-4">
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Employee No.</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->emp_num}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Faculty</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->faculty}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Department</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->department}}</p>
                        </div>
                        
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">First Name</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->first_name}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Middle Name</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->middle_name}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Last Name</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->last_name}}</p>
                        </div>

                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Birthdate</b>
                            <p class="text-hau text-lg tracking-widest">  {{date('F d, Y', strtotime($user->birth_date))}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Age</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->age}}</p>
                        </div>
                        <div class="flex flex-col justify-start gap-1">
                            <b class="text-hau text-sm tracking-wide">Sex</b>
                            <p class="text-hau text-lg tracking-widest">  {{$user->sex}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center gap-x-4">
                <a href="{{route('received.show', $user->id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                    <i class="fa-solid fa-arrow-left mr-1"></i>Back
                </a>
                
            </div>
        </div>

    </x-admin.navigation>
</x-admin.layout>