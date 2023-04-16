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
        <div class="p-2 md:p-5 h-screen w-full">
           <div class="h-full grid grid-cols-1 md:grid-cols-2 justify-items-center">

                @if(!empty(auth()->user()->score) && auth()->user()->application->app_status == 'completed')
                    @if(auth()->user()->user_type == 'basicEd')
                        @include('partials.faculty._basicEdscore')
                    @elseif(auth()->user()->user_type == 'college')
                        @include('partials.faculty._collegescore')
                    @endif
                @else
                    @include('partials.faculty._requirement')
                @endif
                
                {{-- Column 2 --}}
                <div class="py-5 md:py-20 px-3 h-full w-full">
                  
                    <p class="mb-5 font-bold uppercase text-sm md:text-xl text-center tracking-widest">
                        @if(auth()->user()->application->app_status == 'received' || auth()->user()->application->app_status == 'approved' || auth()->user()->application->app_status == 'completed')
                            <i class="fa-solid fa-envelope text-hau mr-1"></i>
                        @else()
                            <i class="fa-solid fa-envelope-open text-hau mr-1"></i>
                        @endif

                        Application Status -
                        @if(auth()->user()->application->app_status == 'approved' || auth()->user()->application->app_status == 'completed')
                            <span class="py-1 px-2 uppercase text-sm text-white bg-green-700 rounded">{{ auth()->user()->application->app_status }}</span>
                        @elseif(auth()->user()->application->app_status == 'received')
                            <span class="py-1 px-2 uppercase text-sm text-white bg-orange-700 rounded">{{ auth()->user()->application->app_status }}</span>
                        @else
                            <span class="py-1 px-2 uppercase text-sm text-white bg-yellow-700 rounded">{{ auth()->user()->application->app_status }}</span>
                        @endif
                    </p>
                    
                    @if(auth()->user()->application->app_status == 'approved' || auth()->user()->application->app_status == 'completed')  
                    <div class="my-20 px-10 ">
                        <h3 class="mb-3 font-bold text-sm md:text-3xl tracking-widest">Good Day,</h3>
                        <p class="font-bold text-lg md:text-3xl tracking-widest">
                            Congratulations! {{ auth()->user()->first_name . ' '. auth()->user()->last_name}}, your application has been approved. We will contact you as soon as we can.
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