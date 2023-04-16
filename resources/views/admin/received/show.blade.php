<x-admin.layout>
    <x-admin.navigation>
    @if(session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
            <p class="text-lg tracking-widest">
                <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
            </p>
        </div>
    @endif   
        
    <div class="p-24 h-screen w-full">
        <p class="uppercase font-bold text-center text-2xl tracking-widest mb-5">Reviewing Applicant {{$user->email}}</p>
        <div class="flex justify-between">
            <a href="/admin/received-applications" class="py-1 px-2 text-white tracking-widest bg-gray-700 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
                <i class="fa-solid fa-arrow-left mr-1"></i>Back
            </a>
            
            @if($user->status == 'verified'
                && $user->application->status == 'verified'
                && $user->undergrads->first()->status == 'verified'
                && $user->prcs->first()->status == 'verified'
                && $user->mpos->first()->status == 'verified'
                && $user->trainings->first()->status == 'verified'
                )
            <button 
                type="submit"
                class="py-1 px-2 text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300"
                data-te-toggle="modal"
                data-te-target="#appApproved"
                data-te-ripple-init
                data-te-ripple-color="light">
                <i class="fa-solid fa-check mr-1"></i> Approved
            </button>
            {{-- [START] Delete Modal --}}
            <div
            data-te-modal-init
            class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="appApproved"
            tabindex="-1"
            aria-labelledby="appApproved"
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
                                <i class="fa-solid fa-triangle-exclamation text-yellow-700"></i>
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
                            <p class="font-bold text-lg tracking-widest">Are you sure you have verified all the necessary Information and continue to approved this application?</p>
                        </div>
                        <div
                            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-opacity-100 p-4 space-x-4">
                            <button
                            type="button"
                            class="py-1 px-2 text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300"
                            data-te-modal-dismiss
                            data-te-ripple-init
                            data-te-ripple-color="light">
                                <i class="fa-solid fa-xmark mr-1"></i> Cancel
                            </button>
                            <form method="POST" action="{{route('verify.approved.approved', $user->application->id)}}">
                                @csrf
                                @method('PUT')
                                    <button class="py-1 px-2 text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                                        <i class="fa-solid fa-check mr-1"></i> Confirm
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- [END] Delete Modal --}}

            @endif
        </div>
        <div class="pt-12 pb-8 flex flex-col gap-8">

           
            <div class="p-3 flex justify-between items-center border-l-4 border-hau rounded-r-lg shadow-2xl">
                <p class="font-bold uppercase text-xl tracking-widest mb-2"><i class="fa-solid fa-id-badge text-2xl text-hau mr-2"></i>Personal Information:
                    <span class="p-1 text-xs text-white rounded {{$user->status == 'verified' ? 'bg-green-700' : 'bg-orange-700'}}">
                        {{$user->status}}
                    </span>
                </p>
                @if($user->status == 'pending' || $user->status == 'processing')
                    <form action="{{route('received.profile', $user->id)}}">
                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                            Verify
                        </button>
                    </form>
                @elseif($user->status == 'verified' || $user->status == 'resubmit')
                    <form action="{{route('received.profile', $user->id)}}">
                        <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                            View
                        </button>
                    </form>
                @endif
            </div>

            <hr class="p-1 border-t-4 border-gray-200 border-dashed">

           
                <div class="p-3 flex justify-between items-center border-l-4 border-hau rounded-r-lg shadow-2xl">
                    <p class="font-bold uppercase text-xl tracking-widest mb-2"><i class="fa-brands fa-black-tie text-2xl text-hau mr-2"></i>Application Information:
                        <span class="p-1 text-xs text-white rounded {{$user->application->status == 'verified' ? 'bg-green-700' : 'bg-orange-700'}}">
                            {{$user->application->status}}
                        </span>
                    </p>
                    @if ($user->application->status == 'pending' || $user->application->status == 'processing')
                        <form action="{{route('received.application', $user->application->id)}}">
                            <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                Verify
                            </button>
                        </form>
                    @elseif($user->application->status == 'verified' || $user->application->status == 'resubmit')
                        <form action="{{route('received.application', $user->application->id)}}">
                            <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                View
                            </button>
                        </form>
                    @endif
                </div>
           

            <hr class="p-1 border-t-4 border-gray-200 border-dashed">

            <div class="p-3 border-l-4 border-hau rounded-r-lg shadow-2xl">
                <p class="font-bold uppercase text-xl tracking-widest mb-2"><i class="fa-solid fa-graduation-cap text-2xl text-hau mr-2"></i>Educational Background</p>
                <div class="mt-4 grid grid-cols-2 gap-y-5 gap-x-20">
                    
                    @foreach ($user->undergrads as $undergrad)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">Undergrad Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$undergrad->status == 'verified' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$undergrad->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($undergrad->created_at))}}
                                </p>
                                @if ($undergrad->status == 'pending' || $undergrad->status == 'processing')
                                    <form action="{{route('received.undergrad', $undergrad->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($undergrad->status == 'verified' || $undergrad->status == 'resubmit')
                                    <form action="{{route('received.undergrad', $undergrad->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                            View
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    @foreach ($user->masters as $master)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">Masters Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$master->status == 'verified' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$master->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                               
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($master->created_at))}}
                                </p>
                                @if ($master->status == 'pending' || $master->status == 'processing')
                                    <form action="{{route('received.masters', $master->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($master->status == 'verified' || $master->status == 'resubmit')
                                    <form action="{{route('received.masters', $master->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                            View
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    @foreach ($user->phds as $phd)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">PHD Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$phd->status == 'verified' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$phd->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($phd->created_at))}}
                                </p>
                                @if ($phd->status == 'pending' || $phd->status == 'processing')
                                    <form action="{{route('received.phd', $phd->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($phd->status == 'verified' || $phd->status == 'resubmit')
                                    <form action="{{route('received.phd', $phd->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                            View
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <hr class="p-1 border-t-4 border-gray-200 border-dashed">

            <div class="p-3 border-l-4 border-hau rounded-r-lg shadow-2xl">
                <p class="font-bold uppercase text-xl tracking-widest mb-2"><i class="fa-solid fa-id-card text-2xl text-hau mr-2"></i>PRC License</p>
                <div class="mt-4 grid grid-cols-2 gap-y-5 gap-x-20">
                    
                    @foreach ($user->prcs as $prc)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">PRC License Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$prc->status == 'verified' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$prc->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                               
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($prc->created_at))}}
                                </p>
                                @if ($prc->status == 'pending' || $prc->status == 'processing')
                                    <form action="{{route('received.prc', $prc->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($prc->status == 'verified' || $prc->status == 'resubmit')
                                    <form action="{{route('received.prc', $prc->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                            View
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <hr class="p-1 border-t-4 border-gray-200 border-dashed">
            
            <div class="p-3 border-l-4 border-hau rounded-r-lg shadow-2xl">
                <p class="font-bold uppercase text-xl tracking-widest mb-2"><i class="fa-solid fa-sitemap text-2xl text-hau mr-2"></i>Membership in Professional Organization</p>
                <div class="mt-4 grid grid-cols-2 gap-y-5 gap-x-20">
                    
                    @foreach ($user->mpos as $mpo)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">Membership in Professional Organization Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$mpo->status == 'verified' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$mpo->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($mpo->created_at))}}
                                </p>
                                @if ($mpo->status == 'pending' || $mpo->status == 'processing')
                                    <form action="{{route('received.mpo', $mpo->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($mpo->status == 'verified' || $mpo->status == 'resubmit')
                                    <form action="{{route('received.mpo', $mpo->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                            View
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <hr class="p-1 border-t-4 border-gray-200 border-dashed">
            
            <div class="p-3 border-l-4 border-hau rounded-r-lg shadow-2xl">
                <p class="font-bold uppercase text-xl tracking-widest mb-2"><i class="fa-solid fa-chalkboard-user text-2xl text-hau mr-2"></i>Trainings/Seminars/Webinars</p>
                <div class="mt-4 grid grid-cols-2 gap-y-5 gap-x-20">
                    
                    @foreach ($user->trainings as $training)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">Trainings/Seminars/Webinars Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$training->status == 'verified' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$training->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($training->created_at))}}
                                </p>
                                @if ($training->status == 'pending' || $training->status == 'processing')
                                    <form action="{{route('received.training', $training->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($training->status == 'verified' || $training->status == 'resubmit')
                                    <form action="{{route('received.training', $training->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                            View
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <hr class="p-1 border-t-4 border-gray-200 border-dashed">

        </div>
    </div>

    </x-admin.navigation>
</x-admin.layout>