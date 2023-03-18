<x-faculty.layout>
    <x-faculty.navigation>
        @if(session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
                <p class="text-lg tracking-widest">
                    <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
                </p>
            </div>
        @endif
        <section class="h-screen w-full pt-20 p-8">
            <div class="flex flex-col jusfity-center items-center gap-y-4">
                <p class="uppercase text-xl text-center tracking-widest"><i class="fa-solid fa-chalkboard-user text-hau mr-2"></i>Trainings/Seminars/Webinars Information</p>
                <a href="{{route('training.create')}}" class="py-1 px-2 text-lg uppercase text-white tracking-widest bg-cyan-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-cyan-600 duration-300 mb-5">
                    <i class="fa-solid fa-plus mr-1"></i>Add Info
                </a>
            </div>

            <div class="pt-5 px-10 grid justify-items-center content-start gap-y-8">
                @foreach (auth()->user()->trainings as $training)
                    @if($training->status == 'resubmit')
                    <h5 class="font-bold uppercase text-center text-lg text-orange-700">
                        <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                        Please Edit this Information
                    </h5>
                    @endif

                    @if($training->status == 'approved')
                    <h5 class="font-bold uppercase text-center text-lg text-green-700">
                        <i class="fa-solid fa-circle-check mr-1"></i></i>
                        This Information has been Verified
                    </h5>
                    @endif
                    <div class="w-3/4 py-5 px-10 border-t-4 border-hau rounded-b shadow-2xl">
                        <div class="grid grid-cols-3 gap-8">
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">From</b>
                                <p class="text-hau text-lg">{{date('F d, Y', strtotime($training->from))}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">To</b>
                                <p class="text-hau text-lg">{{date('F d, Y', strtotime($training->to))}}</p>
                            </div>
                            <div class="col-start-1 flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Title</b>
                                <p class="text-hau text-lg">{{$training->title}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Speaker</b>
                                <p class="text-hau text-lg">{{$training->speaker}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Venue</b>
                                <p class="text-hau text-lg">{{$training->venue}}</p>
                            </div>
                            <div class="flex flex-col justify-start">
                                <b class="font-bold uppercase text-hau tracking-widest">Institution</b>
                                <p class="text-hau text-lg">{{$training->institution}}</p>
                            </div>
                            <div class="col-span-2">
                                <b class="font-bold uppercase text-hau tracking-widest">Certificate - </b>
                                <a href="{{asset('uploads/' . $training->certificate)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                                    Download
                                </a>
                            </div>

                            @if($training->status == 'pending' || $training->status == 'resubmit')
                            <div class="col-start-1 border-t border-hau flex justify-center items-center pt-5 gap-4">
                                <form action="{{route('training.edit', $training->id)}}">
                                    <button class="py-1 px-2 uppercase text-white tracking-widest bg-yellow-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-yellow-600 duration-300">
                                        <i class="fa-regular fa-pen-to-square mr-1"></i>Edit
                                    </button>
                                </form>
                                <button 
                                    type="submit"
                                    class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300"
                                    data-te-toggle="modal"
                                    data-te-target="#training{{$training->id}}"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                    <i class="fa-solid fa-trash mr-1"></i>Delete
                                </button>
                            </div>
                            @endif

                        </div>
                    </div>
                    <hr class="w-full border-t-2 border-dashed border-gray-200">
                    {{-- [START] Delete Modal --}}
                    <div
                        data-te-modal-init
                        class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                        id="training{{$training->id}}"
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
                                    <p class="text-red-500 tracking-widest">Are you sure you want to delete this Trainings/Seminars/Webinars information permanently?</p>
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
                                    <form method="POST" action="{{route('training.destroy', $training->id)}}">
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
            </div>
        </section>
        
    </x-faculty.navigation>
</x-faculty.layout>