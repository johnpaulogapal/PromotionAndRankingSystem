<div class="w-full py-10 px-5 h-full flex flex-col items-center gap-y-4 border-dashed border-x-2 border-gray-200">
    <p class="uppercase text-xl tracking-widest"><i class="fa-solid fa-graduation-cap text-hau mr-2"></i>Masters Information</p>
    <a href="{{route('master.create')}}" class="py-1 px-2 text-lg uppercase text-white tracking-widest bg-cyan-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-cyan-600 duration-300 mb-5">
        <i class="fa-solid fa-plus mr-1"></i>Add Info
    </a>
    @if (auth()->user()->masters->count() == 0)
        <p class="font-bold uppercase text-xl text-center tracking-widest">Masters information has not yet been submitted.</p>
    @else
        @foreach (auth()->user()->masters as $master)
            <div class="w-full mb-2 p-5 border-t-8 {{ $master->status == 'approved' ? 'border-green-500' : 'border-hau'}} rounded-b-lg shadow-2xl space-y-4">

                @if($master->status == 'resubmit')
                <h5 class="font-bold uppercase text-center text-lg text-orange-700">
                    <i class="fa-solid fa-triangle-exclamation mr-1"></i>
                    Please Edit this Information
                </h5>
                @endif

                @if($master->status == 'approved')
                <h5 class="font-bold uppercase text-center text-lg text-green-700">
                    <i class="fa-solid fa-circle-check mr-1"></i></i>
                    This Information has been Verified
                </h5>
                @endif

                <div class="flex flex-col justify-start ">
                    <b class="font-bold uppercase text-hau tracking-widest">School</b>
                    <p class="text-lg text-hau">{{$master->school}}</p>
                </div>
                <div class="flex flex-col justify-start">
                    <b class="font-bold uppercase text-hau tracking-widest">Course</b>
                    <p class="text-lg text-hau">{{$master->course}}</p>
                </div>
                <div class="flex flex-col justify-start">
                    <b class="font-bold uppercase text-hau tracking-widest">Graduation Date</b>
                    <p class="text-lg text-hau">{{date('F d, Y', strtotime($master->graduation_date))}}</p>
                </div>
                
                <div class="">
                    <b class="font-bold uppercase text-hau tracking-widest">Diploma - </b>
                    <a href="{{asset('uploads/' . $master->diploma)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                        Download
                    </a>
                </div>
               
                <div class="">
                    <b class="font-bold uppercase text-hau tracking-widest">Research - </b>
                    <a href="{{asset('uploads/' . $master->research)}}" class="font-bold text-blue-700 tracking-widest underline underline-offset-2 transition hover:text-blue-600 ease-in-out delay-150 duration-300" download>
                        Download
                    </a>
                </div>

                @if($master->status == 'pending' || $master->status == 'resubmit')
                <div class="border-t border-hau flex justify-end pt-5 gap-4">
                    <form action="{{route('master.edit', $master->id)}}">
                        <button class="py-1 px-2 uppercase text-white tracking-widest bg-yellow-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-yellow-600 duration-300">
                            <i class="fa-regular fa-pen-to-square mr-1"></i>Edit
                        </button>
                    </form>
                    <button 
                        type="submit"
                        class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300"
                        data-te-toggle="modal"
                        data-te-target="#master{{$master->id}}"
                        data-te-ripple-init
                        data-te-ripple-color="light">
                        <i class="fa-solid fa-trash mr-1"></i>Delete
                    </button>
                </div>

                {{-- [START] Delete Modal --}}
                <div
                    data-te-modal-init
                    class="fixed pl-60 top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
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
                                <p class="font-bold uppercase tracking-widest">Are you sure you want to delete this Masters Information permanently?</p>
                            </div>
                            <div
                                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-opacity-100 p-4 space-x-4">
                                <button
                                type="button"
                                class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300"
                                data-te-modal-dismiss
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                <i class="fa-solid fa-xmark mr-1"></i>Cancel
                                </button>
                                <form method="POST" action="{{route('master.destroy', $master->id)}}">
                                @csrf
                                @method('DELETE')
                                    <button
                                    type="submit"
                                    class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                    <i class="fa-solid fa-check mr-1"></i>Confirm
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- [END] Delete Modal --}}
                @endif

            </div>
        @endforeach
    @endif
</div>