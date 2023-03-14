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
                <div class="h-full px-5 grid grid-cols-3 gap-x-8 justify-items-center">

                    {{-- UNDERGRAD --}}
                    <div class="w-full py-10 px-5 h-full flex flex-col items-center gap-y-4 border-dashed border-x-2 border-gray-200">
                        <p class="uppercase text-xl tracking-widest"><i class="fa-solid fa-graduation-cap text-hau mr-2"></i>Undergrad Information</p>
                        <a href="{{route('undergrad.create')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300 mb-5">
                            <i class="fa-solid fa-circle-plus mr-1"></i>Add Info
                        </a>
                        @if (auth()->user()->undergrads->count() == 0)
                            <p class="text-center tracking-widest">Please submit your Undergrad information</p>
                        @else
                            @foreach (auth()->user()->undergrads as $undergrad)
                                <div class="w-full mb-2 p-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-4">
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">School</b>
                                        <p class="text-hau tracking-widest">{{$undergrad->school}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">Course</b>
                                        <p class="text-hau tracking-widest">{{$undergrad->course}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">Graduation Date</b>
                                        <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($undergrad->graduation_date))}}</p>
                                    </div>
                                    
                                    <div class="">
                                        <b class="text-hau tracking-wide">Diploma</b>
                                        <a href="{{asset('uploads/' . $undergrad->diploma)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                                            Download
                                        </a>
                                    </div>
                                   
                                    <div class="">
                                        <b class="text-hau tracking-wide">Research</b>
                                        <a href="{{asset('uploads/' . $undergrad->research)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                                            Download
                                        </a>
                                    </div>

                                    <div class="border-t border-hau flex justify-end pt-5 gap-x-4">
                                        <form action="{{route('undergrad.edit', $undergrad->id)}}">
                                            <button class="py-1.5 px-4 text-white text-xl tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-400 duration-300">
                                                <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                                            </button>
                                        </form>
                                        <button 
                                            type="submit"
                                            class="py-1.5 px-4 text-white text-xl tracking-widest bg-red-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-600 duration-300"
                                            data-te-toggle="modal"
                                            data-te-target="#undergrad{{$undergrad->id}}"
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            <i class="fa-solid fa-trash-can mr-1"></i>Delete
                                        </button>
                                    </div>
                                    {{-- [START] Delete Modal --}}
                                    <div
                                        data-te-modal-init
                                        class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                        id="undergrad{{$undergrad->id}}"
                                        tabindex="-1"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div
                                            data-te-modal-dialog-ref
                                            class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                            <div
                                            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                                                <div
                                                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-t-2 border-hau p-4">
                                                    <h5
                                                    class="text-3xl font-medium leading-normal text-neutral-800"
                                                    id="exampleModalLabel">
                                                        <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
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
                                                    <p class="text-red-500 tracking-widest">Are you sure you want to delete this Undergrad information permanently?</p>
                                                </div>
                                                <div
                                                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-opacity-100 p-4 space-x-4">
                                                    <button
                                                    type="button"
                                                    class="py-1 px-2 text-white tracking-widest bg-gray-400 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-500 duration-300"
                                                    data-te-modal-dismiss
                                                    data-te-ripple-init
                                                    data-te-ripple-color="light">
                                                        Close
                                                    </button>
                                                    <form method="POST" action="{{route('undergrad.destroy', $undergrad->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button
                                                        type="submit"
                                                        class="py-1 px-2 text-white tracking-widest bg-blue-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-600 duration-300"
                                                        data-te-ripple-init
                                                        data-te-ripple-color="light">
                                                            Confirm
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- [END] Delete Modal --}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    
                    {{-- MASTERS --}}
                    <div class="w-full py-10 px-5 h-full flex flex-col items-center gap-y-4 border-dashed border-x-2 border-gray-200">
                        <p class="uppercase text-xl tracking-widest"><i class="fa-solid fa-graduation-cap text-hau mr-2"></i>Masters Information</p>
                        <a href="{{route('master.create')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300 mb-5">
                            <i class="fa-solid fa-circle-plus mr-1"></i>Add Info
                        </a>
                        @if (auth()->user()->masters->count() == 0)
                            <p class="text-center tracking-widest">Please submit your Masters information</p>
                        @else
                            @foreach (auth()->user()->masters as $master)
                                <div class="w-full mb-2 p-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-4">
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">School</b>
                                        <p class="text-hau tracking-widest">{{$master->school}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">Course</b>
                                        <p class="text-hau tracking-widest">{{$master->course}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">Graduation Date</b>
                                        <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($master->graduation_date))}}</p>
                                    </div>

                                    <div class="">
                                        <b class="text-hau tracking-wide">Diploma</b>
                                        <a href="{{asset('uploads/' . $master->diploma)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                                            Download
                                        </a>
                                    </div>
                                   
                                    <div class="">
                                        <b class="text-hau tracking-wide">Research</b>
                                        <a href="{{asset('uploads/' . $master->research)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                                            Download
                                        </a>
                                    </div>

                                    <div class="border-t border-hau flex justify-end pt-5 gap-x-4">
                                        <form action="{{route('master.edit', $master->id)}}">
                                            <button class="py-1.5 px-4 text-white text-xl tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-400 duration-300">
                                                <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                                            </button>
                                        </form>
                                        <button 
                                            type="submit"
                                            class="py-1.5 px-4 text-white text-xl tracking-widest bg-red-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-600 duration-300"
                                            data-te-toggle="modal"
                                            data-te-target="#master{{$master->id}}"
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            <i class="fa-solid fa-trash-can mr-1"></i>Delete
                                        </button>
                                    </div>
                                </div>
                                {{-- [START] Delete Modal --}}
                                <div
                                    data-te-modal-init
                                    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="master{{$master->id}}"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div
                                        data-te-modal-dialog-ref
                                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                        <div
                                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                                            <div
                                                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-t-2 border-hau p-4">
                                                <h5
                                                class="text-3xl font-medium leading-normal text-neutral-800"
                                                id="exampleModalLabel">
                                                    <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
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
                                                <p class="text-red-500 tracking-widest">Are you sure you want to delete this Masters information permanently?</p>
                                            </div>
                                            <div
                                                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-opacity-100 p-4 space-x-4">
                                                <button
                                                type="button"
                                                class="py-1 px-2 text-white tracking-widest bg-gray-400 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-500 duration-300"
                                                data-te-modal-dismiss
                                                data-te-ripple-init
                                                data-te-ripple-color="light">
                                                    Close
                                                </button>
                                                <form method="POST" action="{{route('master.destroy', $master->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                    <button
                                                    type="submit"
                                                    class="py-1 px-2 text-white tracking-widest bg-blue-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-600 duration-300"
                                                    data-te-ripple-init
                                                    data-te-ripple-color="light">
                                                        Confirm
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- [END] Delete Modal --}}
                            @endforeach
                        @endif
                    </div>

                    {{-- PHD --}}
                    <div class="w-full py-10 px-5 h-full flex flex-col items-center gap-y-4 border-dashed border-x-2 border-gray-200">
                        <p class="uppercase text-xl tracking-widest"><i class="fa-solid fa-graduation-cap text-hau mr-2"></i>PHD Information</p>
                        <a href="{{route('phd.create')}}" class="py-1.5 px-4 text-xl text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300 mb-5">
                            <i class="fa-solid fa-circle-plus mr-1"></i>Add Info
                        </a>
                        @if (auth()->user()->phds->count() == 0)
                            <p class="text-center tracking-widest">Please submit your PHD information</p>
                        @else
                            @foreach (auth()->user()->phds as $phd)
                                <div class="w-full mb-2 p-5 border-t-4 border-hau rounded-b-lg shadow-2xl space-y-4">
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">School</b>
                                        <p class="text-hau tracking-widest">{{$phd->school}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">Course</b>
                                        <p class="text-hau tracking-widest">{{$phd->course}}</p>
                                    </div>
                                    <div class="flex flex-col justify-start">
                                        <b class="text-hau tracking-wide">Graduation Date</b>
                                        <p class="text-hau tracking-widest">{{date('F d, Y', strtotime($phd->graduation_date))}}</p>
                                    </div>

                                    <div class="">
                                        <b class="text-hau tracking-wide">Diploma</b>
                                        <a href="{{asset('uploads/' . $phd->diploma)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                                            Download
                                        </a>
                                    </div>
                                   
                                    <div class="">
                                        <b class="text-hau tracking-wide">Research</b>
                                        <a href="{{asset('uploads/' . $phd->research)}}" class="py-1 px-2 text-sm text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300" download>
                                            Download
                                        </a>
                                    </div>

                                    <div class="border-t border-hau flex justify-end pt-5 gap-x-4">
                                        <form action="{{route('phd.edit', $phd->id)}}">
                                            <button class="py-1.5 px-4 text-white text-xl tracking-widest bg-yellow-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-400 duration-300">
                                                <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                                            </button>
                                        </form>
                                        <button 
                                            type="submit"
                                            class="py-1.5 px-4 text-white text-xl tracking-widest bg-red-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-600 duration-300"
                                            data-te-toggle="modal"
                                            data-te-target="#phd{{$phd->id}}"
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            <i class="fa-solid fa-trash-can mr-1"></i>Delete
                                        </button>
                                    </div>
                                </div>

                                {{-- [START] Delete Modal --}}
                                <div
                                    data-te-modal-init
                                    class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="phd{{$phd->id}}"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div
                                        data-te-modal-dialog-ref
                                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                        <div
                                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                                            <div
                                                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-t-2 border-hau p-4">
                                                <h5
                                                class="text-3xl font-medium leading-normal text-neutral-800"
                                                id="exampleModalLabel">
                                                    <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
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
                                                <p class="text-red-500 tracking-widest">Are you sure you want to delete this PHD information permanently?</p>
                                            </div>
                                            <div
                                                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-opacity-100 p-4 space-x-4">
                                                <button
                                                type="button"
                                                class="py-1 px-2 text-white tracking-widest bg-gray-400 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-500 duration-300"
                                                data-te-modal-dismiss
                                                data-te-ripple-init
                                                data-te-ripple-color="light">
                                                    Close
                                                </button>
                                                <form method="POST" action="{{route('phd.destroy', $phd->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                    <button
                                                    type="submit"
                                                    class="py-1 px-2 text-white tracking-widest bg-blue-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-blue-600 duration-300"
                                                    data-te-ripple-init
                                                    data-te-ripple-color="light">
                                                        Confirm
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- [END] Delete Modal --}}
                            @endforeach
                        @endif
                    </div>
                    

                    

                </div>
            </div>
        </section>

    </x-faculty.navigation>
</x-faculty.layout>