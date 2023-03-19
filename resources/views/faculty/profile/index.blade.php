<x-faculty.layout>
    <x-faculty.navigation>
    @if(session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
            <p class="text-lg tracking-widest">
                <i class="fa-solid fa-check mr-2"></i>{{session('message') . " " . auth()->user()->email}}
            </p>
        </div>
    @endif
    <section>
        <div class="p-5 h-screen w-full">
           <div class="h-full grid grid-cols-1 md:grid-cols-2 justify-items-center">

                {{-- Column 1 --}}
                <div class="p-10 h-full w-full">
                    <div class="p-10 h-full">
                      
                        <p class="mb-8 font-bold uppercase text-xl tracking-widest"><i class="fa-solid fa-list-check text-hau mr-2"></i>Requirements to be submitted</p>
                        <p class="mb-1 font-bold uppercase tracking-widest"><i class="fa-solid fa-flag text-hau mr-1"></i>Progress</p>
                        <div class="mb-5 h-1 w-full bg-gray-300 rounded-2xl"> 
                            {{-- Code for Progress bar --}}
                            @php
                                $progress = '';
                                $undergrads = 0;
                                $masters = 0;
                                $phds = 0;
                                if(count(auth()->user()->undergrads) > 0){
                                    $undergrads = 1;
                                }

                                if(count(auth()->user()->masters) > 0){
                                    $masters = 1;
                                }

                                if(count(auth()->user()->phds) > 0){
                                    $phds = 1;
                                }
                                $edubg =  $undergrads + $masters + $phds;
                                $prcs =  count(auth()->user()->prcs);
                                $mpos =  count(auth()->user()->mpos);
                                $trainings =  count(auth()->user()->trainings);

                                $total = $edubg + $prcs + $mpos + $trainings;
                                
                                if($total === 1){
                                    $progress = 'bg-yellow-200 w-1/12';
                                }
                                elseif($total === 2){
                                    $progress = 'bg-yellow-300 w-1/3';
                                }
                                elseif($total === 3){
                                    $progress = 'bg-orange-400 w-1/2';
                                }
                                elseif($total === 4){
                                    $progress = 'bg-orange-500 w-3/4';
                                }
                                elseif($total === 5){
                                    $progress = 'bg-green-600 w-4/5';
                                }
                                elseif($total > 5){
                                    $progress = 'bg-green-700 w-full';
                                }
                                else
                                    $progress = '';
                            @endphp
                            <div class="h-1 {{$progress}}"></div>
                        </div>
                        <div class="flex flex-col gap-y-4">

                            <div class="py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-circle-check text-xl text-green-500 mr-5"></i>
                                    <p class="font-bold tracking-widest">Personal Information</p>
                                </div>
                                <a href="{{route('profile.show', auth()->user()->id)}}" class="py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                    View
                                </a>
                            </div>
                            <div class="py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div id="edubg" class="flex items-center">
                                    @if(count(auth()->user()->undergrads) == 1 && count(auth()->user()->masters) == 0 && count(auth()->user()->phds) == 0)
                                        <i class="fa-solid fa-spinner text-xl text-yellow-500 mr-5"></i>
                                    @elseif(count(auth()->user()->undergrads) == 0 && count(auth()->user()->masters) == 1 && count(auth()->user()->phds) == 0)
                                        <i class="fa-solid fa-spinner text-xl text-yellow-500 mr-5"></i>
                                    @elseif(count(auth()->user()->undergrads) == 0 && count(auth()->user()->masters) == 0 && count(auth()->user()->phds) == 1)
                                        <i class="fa-solid fa-spinner text-xl text-yellow-500 mr-5"></i>
                                    @elseif(count(auth()->user()->undergrads) > 0 && count(auth()->user()->masters) > 0 && count(auth()->user()->phds) > 0)
                                        <i class="fa-solid fa-circle-check text-xl text-green-500 mr-5"></i>
                                    @else
                                        <i class="fa-solid fa-circle-xmark text-xl text-red-500 mr-5"></i>
                                    @endif
                                    <p class="font-bold tracking-widest">Educational Background</p>
                                </div>

                                {{-- Buttons to Open and CLose the Content of Educational Background --}}
                                <i id="edubgOpen" class="fa-solid fa-chevron-down mr-2 cursor-pointer"></i>
                                <i id="edubgClose" class="hidden self-end fa-solid fa-chevron-up mr-2 cursor-pointer"></i>

                                <div id="edubgContent" class="absolute mt-5 flex flex-col gap-y-2 opacity-0">
                                    <div class="ml-16 py-2 px-5 flex justify-between items-center gap-x-2">
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-circle-{{ count(auth()->user()->undergrads) > 0 ? 'check text-green-500' : 'xmark text-red-500' }} text-xl mr-5"></i>
                                            <p class="tracking-widest">Undergrad</p>
                                        </div>
                                    </div>
                                    <div class="ml-16 py-2 px-5 flex justify-between items-center gap-x-2">
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-circle-{{ count(auth()->user()->masters) > 0 ? 'check text-green-500' : 'xmark text-red-500' }} text-xl mr-5"></i>
                                            <p class="tracking-widest">Masters</p>
                                        </div>
                                    </div>
                                    <div class="ml-16 py-2 px-5 flex justify-between items-center gap-x-2">
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-circle-{{ count(auth()->user()->phds) > 0 ? 'check text-green-500' : 'xmark text-red-500' }} text-xl mr-5"></i>
                                            <p class="tracking-widest">PHD</p>
                                        </div>
                                    </div>
                                    <a href="{{route('edubg')}}" class="mt-2 self-center py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                        Submit
                                    </a>
                                </div>
                                
                            </div>
                            
                            
                            <div class="py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div class="flex items-center ">
                                    <i class="fa-solid fa-circle-{{ count(auth()->user()->prcs) > 0 ? 'check text-green-500' : 'xmark text-red-500' }}  text-xl mr-5"></i>
                                    <p class="font-bold tracking-widest">PRC License</p>
                                </div>
                                <a href="{{route('prc.index')}}" class="py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                    Submit
                                </a>
                            </div>
                            <div class="py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div class="flex items-center ">
                                    <i class="fa-solid fa-circle-{{ count(auth()->user()->mpos) > 0 ? 'check text-green-500' : 'xmark text-red-500' }} text-xl mr-5"></i>
                                    <p class="font-bold tracking-widest">Membership in Professional Organization</p>
                                </div>
                                <a href="{{route('mpo.index')}}" class="py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                    Submit
                                </a>
                            </div>
                            <div class="ww py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div class="flex items-center ">
                                    <i class="fa-solid fa-circle-{{ count(auth()->user()->trainings) > 0 ? 'check text-green-500' : 'xmark text-red-500' }} text-xl mr-5"></i>
                                    <p class="font-bold tracking-widest">Trainings/Seminars/Webinars</p>
                                </div>
                                <a href="{{route('training.index')}}" class="py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                    Submit
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                
                {{-- Column 2 --}}
                <div class="py-20 px-3 h-full w-full">
                  
                    <p class="mb-5 font-bold uppercase text-xl tracking-widest">
                        @if(auth()->user()->application->app_status == 'received' || auth()->user()->application->app_status == 'approved')
                            <i class="fa-solid fa-envelope text-hau mr-1"></i>
                        @else()
                            <i class="fa-solid fa-envelope-open text-hau mr-1"></i>
                        @endif

                        Application Status -
                        @if(auth()->user()->application->app_status == 'approved')
                            <span class="py-1 px-2 uppercase text-sm text-white bg-green-700 rounded">{{ auth()->user()->application->app_status }}</span>
                        @elseif(auth()->user()->application->app_status == 'received')
                            <span class="py-1 px-2 uppercase text-sm text-white bg-orange-700 rounded">{{ auth()->user()->application->app_status }}</span>
                        @else
                            <span class="py-1 px-2 uppercase text-sm text-white bg-yellow-700 rounded">{{ auth()->user()->application->app_status }}</span>
                        @endif
                    </p>
                    
                    @if(auth()->user()->application->app_status == 'approved')  
                    <div class="my-20 px-10 ">
                        <h3 class="mb-3 font-bold text-xl tracking-widest">Good Day,</h3>
                        <p class="font-bold text-3xl tracking-widest">
                            Congratulations, {{ auth()->user()->first_name . ' '. auth()->user()->last_name}} ! Your application has been approved. We will contact you as soon as we can.
                        </p>
                    </div>
                    @else
                        <ul
                        class="mb-5 flex list-none flex-col flex-wrap border-b-0 pl-0 md:flex-row"
                        role="tablist"
                        data-te-nav-ref>
                            <li role="presentation" class="flex-grow basis-0 text-center">
                                <a
                                href="#tabs-processing"
                                class="my-2 block border-x-0 border-t-0 border-b-2 border-transparent px-7 pt-4 pb-3.5 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-yellow-700 data-[te-nav-active]:text-yellow-700 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-yellow-700-400 dark:data-[te-nav-active]:text-yellow-700-400"
                                data-te-toggle="pill"
                                data-te-target="#tabs-processing"
                                data-te-nav-active
                                role="tab"
                                aria-controls="tabs-processing"
                                aria-selected="true"
                                >
                                <span class="font-bold uppercase text-lg text-yellow-700">
                                    <i class="fa-solid fa-gear mr-1"></i> Processing:
                                    {{ $totalUserProcessing + $totalApplicationProcessing +  $totalUndergradProcessing + $totalMasterProcessing + $totalPhdProcessing + $totalPrcProcessing + $totalMpoProcessing + $totalTrainingProcessing}}
                                </span>
                                </a>
                            </li>
                            <li role="presentation" class="flex-grow basis-0 text-center">
                                <a
                                href="#tabs-resubmit"
                                class="focus:border-transparen my-2 block border-x-0 border-t-0 border-b-2 border-transparent px-7 pt-4 pb-3.5 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-orange-700 data-[te-nav-active]:text-orange-700 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-orange-700 dark:data-[te-nav-active]:text-orange-700"
                                data-te-toggle="pill"
                                data-te-target="#tabs-resubmit"
                                role="tab"
                                aria-controls="tabs-resubmit"
                                aria-selected="false"
                                >
                                <span class="font-bold uppercase text-lg text-orange-700">
                                    <i class="fa-solid fa-rotate-left mr-1"></i> Resubmit: 
                                    {{ $totalUserResubmit + $totalApplicationResubmit +  $totalUndergradResubmit + $totalMasterResubmit + $totalPhdResubmit + $totalPrcResubmit + $totalMpoResubmit + $totalTrainingResubmit}}
                                </span>
                                </a>
                            </li>
                            <li role="presentation" class="flex-grow basis-0 text-center">
                                <a
                                href="#tabs-verified"
                                class="focus:border-transparen my-2 block border-x-0 border-t-0 border-b-2 border-transparent px-7 pt-4 pb-3.5 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate data-[te-nav-active]:border-green-700 data-[te-nav-active]:text-green-700 dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-green-700 dark:data-[te-nav-active]:text-green-700"
                                data-te-toggle="pill"
                                data-te-target="#tabs-verified"
                                role="tab"
                                aria-controls="tabs-verified"
                                aria-selected="false"
                                >
                                <span class="font-bold uppercase text-black text-lg text-green-700">
                                    <i class="fa-solid fa-check mr-1"></i> Verified:
                                    {{ $totalUserVerified + $totalApplicationVerified +  $totalUndergradVerified + $totalMasterVerified + $totalPhdVerified + $totalPrcVerified + $totalMpoVerified + $totalTrainingVerified}}
                                </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mb-6">
                            <div
                                class="hidden opacity-0 opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-processing"
                                role="tabpanel"
                                aria-labelledby="tabs-processing"
                                data-te-tab-active>
                                @include('partials.faculty._processing')
                            </div>
                            <div
                                class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-resubmit"
                                role="tabpanel"
                                aria-labelledby="tabs-profile-tab02">
                                @include('partials.faculty._resubmit')
                            </div>
                            <div
                                class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                                id="tabs-verified"
                                role="tabpanel"
                                aria-labelledby="tabs-profile-tab02">
                                @include('partials.faculty._verified')
                            </div>
                        </div>
                    @endif

                    
                </div>

    </x-faculty.navigation>

    

</x-faculty.layout>