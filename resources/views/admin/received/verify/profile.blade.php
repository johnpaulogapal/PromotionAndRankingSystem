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
            <div class="flex justify-center items-center gap-x-12">
                <a href="{{route('received.show', $user->id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                    <i class="fa-solid fa-arrow-left mr-1"></i>Back
                </a>

                {{-- Button Checked Modal--}}
                <button 
                    type="button" 
                    class="py-1.5 px-4 text-xl text-white tracking-widest bg-red-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-600 duration-300"
                    data-te-toggle="modal"
                    data-te-target="#resubmitProfileModal"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    <i class="fa-solid fa-rotate-left mr-1"></i>Resubmit
                </button>

                {{-- Button Checked Modal--}}
                <button 
                    type="button" 
                    class="py-1.5 px-4 text-xl text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300"
                    data-te-toggle="modal"
                    data-te-target="#checkedProfileModal"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    <i class="fa-solid fa-check mr-1"></i>Check
                </button>
                


                {{-- Start Checked Modal --}}
                <div
                data-te-modal-init
                class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                id="checkedProfileModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                    <div
                    data-te-modal-dialog-ref
                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                        <div
                            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
                            <div
                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 ">
                            <h5
                                class="leading-normal text-xl"
                                id="exampleModalLabel">
                                <i class="fa-solid fa-triangle-exclamation text-yellow-600 mr-1"></i>
                            </h5>
                            <button
                                type="button"
                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                data-te-modal-dismiss
                                aria-label="Close">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div>
                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                <p class="font-bold text-lg tracking-widest">Are you sure you have checked this information?</p>
                            </div>
                            <div
                            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 gap-x-4">
                            <button
                                type="button"
                                class="py-1 px-2 text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300"
                                data-te-modal-dismiss
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Cancel
                            </button>
                            <a
                                href=""
                                class="py-1 px-2 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Confirm
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Checked Modal --}}

                {{-- Resubmit Checked Modal --}}
                <div
                data-te-modal-init
                class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                id="resubmitProfileModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                    <div
                    data-te-modal-dialog-ref
                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                        <div
                            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none ">
                            <div
                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 ">
                            <h5
                                class="leading-normal text-xl"
                                id="exampleModalLabel">
                                <i class="fa-solid fa-triangle-exclamation text-yellow-600 mr-1"></i>
                            </h5>
                            <button
                                type="button"
                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                data-te-modal-dismiss
                                aria-label="Close">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            </div>
                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                <p class="font-bold text-lg tracking-widest">Are you sure you want the user to resubmit this information?</p>
                                <div class="flex flex-col p-5">
                                    <label class="font-bold text-hau text-sm tracking-wider">Please add a comment</label>
                                    <textarea name="" id="" cols="30" rows="5" class="py-0.5 px-2 border border-hau caret-hau outline-hau resize-none"></textarea>
                                </div>
                            </div>
                            <div
                            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 gap-x-4">
                            <button
                                type="button"
                                class="py-1 px-2 text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300"
                                data-te-modal-dismiss
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Cancel
                            </button>
                            <a
                                href=""
                                class="py-1 px-2 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Confirm
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Resubmit Modal --}}


            </div>
        </div>

        

    </x-admin.navigation>
</x-admin.layout>