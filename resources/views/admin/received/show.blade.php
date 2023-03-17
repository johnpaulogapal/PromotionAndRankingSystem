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
        <p class="uppercase font-bold text-center text-2xl tracking-widest mb-5">Reviewing Applicant - {{$user->email}}</p>
        <a href="/admin/received-applications" class="py-1.5 px-4 text-xl text-white tracking-widest bg-gray-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-gray-600 duration-300">
            <i class="fa-solid fa-arrow-left mr-1"></i>Back
        </a>
        <div class="pt-12 pb-8 flex flex-col gap-8">

           
            <div class="p-3 flex justify-between items-center border-l-4 border-hau rounded-r-lg shadow-2xl">
                <p class="font-bold uppercase text-xl tracking-widest mb-2"><i class="fa-solid fa-id-badge text-2xl text-hau mr-2"></i>Personal Information:
                    <span class="p-1 text-xs text-white rounded {{$user->status == 'approved' ? 'bg-green-700' : 'bg-orange-700'}}">
                        {{$user->status}}
                    </span>
                </p>
                @if($user->status == 'pending' || $user->status == 'processing')
                    <form action="{{route('received.profile', $user->id)}}">
                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                            Verify
                        </button>
                    </form>
                @elseif($user->status == 'approved' || $user->status == 'resubmit')
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
                        <span class="p-1 text-xs text-white rounded {{$user->application->status == 'approved' ? 'bg-green-700' : 'bg-orange-700'}}">
                            {{$user->application->status}}
                        </span>
                    </p>
                    @if ($user->application->status == 'pending' || $user->application->status == 'processing')
                        <form action="{{route('received.application', $user->application->id)}}">
                            <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                Verify
                            </button>
                        </form>
                    @elseif($user->application->status == 'approved' || $user->application->status == 'resubmit')
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
                <div class="mt-4 grid grid-cols-3 gap-8">
                    
                    @foreach ($user->undergrads as $undergrad)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">Undergrad Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$undergrad->status == 'approved' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$undergrad->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                <p class="font-bold tracking-wide">
                                    ID: {{$undergrad->id}} -
                                </p>
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($undergrad->created_at))}} -
                                </p>
                                @if ($undergrad->status == 'pending' || $undergrad->status == 'processing')
                                    <form action="{{route('received.undergrad', $undergrad->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($undergrad->status == 'approved' || $undergrad->status == 'resubmit')
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
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$master->status == 'approved' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$master->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                <p class="font-bold tracking-wide">
                                    ID: {{$master->id}} -
                                </p>
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($master->created_at))}} -
                                </p>
                                @if ($master->status == 'pending' || $master->status == 'processing')
                                    <form action="{{route('received.masters', $master->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($master->status == 'approved' || $master->status == 'resubmit')
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
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$phd->status == 'approved' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$phd->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                <p class="font-bold tracking-wide">
                                    ID: {{$phd->id}} -
                                </p>
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($phd->created_at))}} -
                                </p>
                                @if ($phd->status == 'pending' || $phd->status == 'processing')
                                    <form action="{{route('received.phd', $phd->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($phd->status == 'approved' || $phd->status == 'resubmit')
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
                <div class="mt-4 grid grid-cols-3 gap-8">
                    
                    @foreach ($user->prcs as $prc)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">PRC License Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$prc->status == 'approved' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$prc->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                <p class="font-bold tracking-wide">
                                    ID: {{$prc->id}} -
                                </p>
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($prc->created_at))}} -
                                </p>
                                @if ($prc->status == 'pending' || $prc->status == 'processing')
                                    <form action="{{route('received.prc', $prc->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($prc->status == 'approved' || $prc->status == 'resubmit')
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
                <div class="mt-4 grid grid-cols-3 gap-8">
                    
                    @foreach ($user->mpos as $mpo)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">Membership in Professional Organization Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$mpo->status == 'approved' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$mpo->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                <p class="font-bold tracking-wide">
                                    ID: {{$mpo->id}} -
                                </p>
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($mpo->created_at))}} -
                                </p>
                                @if ($mpo->status == 'pending' || $mpo->status == 'processing')
                                    <form action="{{route('received.mpo', $mpo->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($mpo->status == 'approved' || $mpo->status == 'resubmit')
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
                <div class="mt-4 grid grid-cols-3 gap-8">
                    
                    @foreach ($user->trainings as $training)
                        <div class="p-2 gap-x-2 border-b-2 border-hau">
                            <p class="font-bold uppercase text-sm mb-5">Trainings/Seminars/Webinars Information:
                                <span class="p-1 text-xs text-white tracking-widest rounded {{$training->status == 'approved' ? 'bg-green-700' : 'bg-orange-700'}}">
                                    {{$training->status}}
                                </span>
                            </p>
                            <div class="flex justify-between items-center">
                                <p class="font-bold tracking-wide">
                                    ID: {{$training->id}} -
                                </p>
                                <p class="font-bold tracking-wide">
                                    Submitted on {{date('F d, Y', strtotime($training->created_at))}} -
                                </p>
                                @if ($training->status == 'pending' || $training->status == 'processing')
                                    <form action="{{route('received.training', $training->id)}}">
                                        <button class="p-1 text-white tracking-widest bg-green-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-green-600 duration-300">
                                            Verify
                                        </button>
                                    </form>
                                @elseif($training->status == 'approved' || $training->status == 'resubmit')
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