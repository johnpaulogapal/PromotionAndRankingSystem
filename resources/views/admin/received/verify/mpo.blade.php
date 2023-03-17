<x-admin.layout>
    <x-admin.navigation>
    <div class="pt-24 p-16 h-screen w-full grid place-items-center content-start gap-8">
        <p class="font-bold uppercase text-center text-xl tracking-widest mb-2">
            Membership in Professional Organization Information of {{$mpo->user->first_name . " " . $mpo->user->last_name}}
        </p>
        
        <div class="w-1/2 p-5 border-t-4 border-hau grid grid-cols-2 gap-4 rounded-b shadow-2xl">
            <div class="justify-self-center flex items-center">
                qwe
            </div>
            <div class="grid grid-rows-3 gap-y-4">
                <div class="flex flex-col justify-start">
                    <b class="text-hau text-sm tracking-wide">Organiztion Name</b>
                    <p class="text-hau text-lg tracking-widest">{{$mpo->org_name}}</p>
                </div>
                <div class="flex flex-col justify-start">
                    <b class="text-hau text-sm tracking-wide">Validity</b>
                    <p class="text-hau text-lg tracking-widest">{{date('F d, Y', strtotime($mpo->mpo_num))}}</p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center justify-center gap-x-4">
            <a href="{{route('received.show', $mpo->user_id)}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                <i class="fa-solid fa-arrow-left mr-1"></i>Back
            </a>

            {{-- Button Checked Modal--}}
            <button 
                type="button" 
                class="py-1.5 px-4 text-xl text-white tracking-widest bg-red-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-600 duration-300"
                data-te-toggle="modal"
                data-te-target="#resubmitMPOModal"
                data-te-ripple-init
                data-te-ripple-color="light">
                <i class="fa-solid fa-rotate-left mr-1"></i>Resubmit
            </button>

            {{-- Button Checked Modal--}}
            <button 
                type="button" 
                class="py-1.5 px-4 text-xl text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300"
                data-te-toggle="modal"
                data-te-target="#checkedMPOModal"
                data-te-ripple-init
                data-te-ripple-color="light">
                <i class="fa-solid fa-check mr-1"></i>Check
            </button>
            


            {{-- Start Checked Modal --}}
            <div
            data-te-modal-init
            class="fixed pl-60 top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="checkedMPOModal"
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
                        <form method="POST" action="{{route('verify.approved.mpo', $mpo->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="relative flex-auto p-4" data-te-modal-body-ref>
                            <p class="font-bold text-lg tracking-widest">Are you sure you have approved this information?</p>
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
                            <button
                                type="submit"
                                class="py-1 px-2 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Confirm
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Checked Modal --}}

            {{-- Resubmit Checked Modal --}}
            <div
            data-te-modal-init
            class="fixed pl-60 top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="resubmitMPOModal"
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
                        <form method="POST" action="{{route('verify.resubmit.mpo', $mpo->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="relative flex-auto p-4" data-te-modal-body-ref>
                            <p class="font-bold text-lg tracking-widest">Are you sure you want the user to resubmit this information?</p>
                            <div class="flex flex-col p-5">
                                <label class="font-bold text-hau text-sm tracking-wider">Please add a comment <span class="text-red-500">(It is required)</span></label>
                                <textarea name="comment" id="" cols="30" rows="5" class="py-0.5 px-2 border border-hau caret-hau outline-hau resize-none"></textarea>
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
                            <button
                                type="submit"
                                class="py-1 px-2 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Confirm
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Resubmit Modal --}}  
        </div> 

    </div>
    </x-admin.navigation>
</x-admin.layout>