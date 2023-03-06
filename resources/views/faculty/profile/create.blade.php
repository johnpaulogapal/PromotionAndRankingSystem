<x-faculty.layout>
    <x-faculty.navigation>
        
        <section>
            <form method="POST" action="{{route('profile.store', auth()->user()->id)}}" class="pt-16 p-8 h-screen w-full">
            @csrf
                <div class="grid grid-cols-3 gap-x-12">
                    <div class="col-span-2 py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold text-hau text-lg tracking-widest">Employee Information</p>
                        <div class="grid grid-rows-3 gap-8">
                            <div class="grid grid-cols-3">
                                <div class="">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Faculty</label>
                                    <input name="faculty" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                </div>
                                <div class="">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Department</label>
                                    <input name="department" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                </div>
                                <div class="">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Employee No.</label>
                                    <input name="emp_num" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                </div>
                            </div>
        
                            <div class="grid grid-cols-3">
                                <div class="">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">First Name</label>
                                    <input name="first_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                </div>
                                <div class="">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Middle Name</label>
                                    <input name="middle_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                </div>
                                <div class="">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Last Name</label>
                                    <input name="last_name" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-x-8 justify-items-start place-items-center">
                                <div class="">
                                    <label for="" class="font-bold text-hau text-sm tracking-wider">Birthdate</label>
                                    <input name="birth_date" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                                </div>
                               
                                <div class="flex justify-center items-center gap-1">
                                    <label class="font-bold text-hau text-sm tracking-wider">Sex </label>
                                    <div class="ml-4">
                                        <input name="sex" type="radio" value="Male" class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-red-500">
                                        <label for="" class="text-hau text-sm tracking-wider">Male</label>
                                    </div>   
                                    <div class="ml-4">
                                        <input name="sex" type="radio" value="Female" class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-red-500">
                                        <label for="" class="text-hau text-sm tracking-wider">Female</label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="py-10 px-5 border-t-4 border-hau rounded-b shadow-2xl space-y-5">
                        <p class="font-bold text-hau text-lg tracking-widest">Application Information</p>
                        <div class="px-5 grid grid-rows-1 gap-4">
                            <div class="flex flex-col">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Date Hired</label>
                                <input name="faculty" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Current Rank</label>
                                <input name="department" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Date of Last Promotion</label>
                                <input name="emp_num" type="date" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            </div>
                            <div class="flex flex-col">
                                <label for="" class="font-bold text-hau text-sm tracking-wider">Proposed Rank</label>
                                <input name="emp_num" type="text" class="py-0.5 px-2 border border-hau rounded caret-hau outline-hau">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="mt-10 p-10 flex justify-end">
                    <button class="py-1 px-2 text-lg text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                        Proceed
                    </button>
                </div>
            </form>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>