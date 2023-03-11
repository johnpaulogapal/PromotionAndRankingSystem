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
           <div class="h-full grid grid-cols-2 gap-x-4 justify-items-center">

                {{-- Column 1 --}}
                <div class="p-10 h-full w-full">
                    <div class="p-10 h-full border-r-2 border-dashed">
                        <p class="mb-5 text-sm uppercase tracking-widest">{{date('D - F d, Y', strtotime(now()))}}</p>
                        <p class="mb-5 text-xl uppercase tracking-widest"><i class="fa-solid fa-list-check text-hau mr-2"></i>Requirements to be submitted</p>
                        <p class="mb-1 text-sm uppercase tracking-widest">Progress</p>
                        <div class="mb-5 h-1 w-full bg-neutral-200"> 
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
                                    $progress = 'bg-yellow-300 w-1/12';
                                }
                                elseif($total === 2){
                                    $progress = 'bg-yellow-500 w-1/3';
                                }
                                elseif($total === 3){
                                    $progress = 'bg-orange-500 w-1/2';
                                }
                                elseif($total === 4){
                                    $progress = 'bg-orange-500 w-3/4';
                                }
                                elseif($total === 5){
                                    $progress = 'bg-green-300 w-4/5';
                                }
                                elseif($total > 5){
                                    $progress = 'bg-green-500 w-full';
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
                                    <p class="font-bold tracking-widest">Membership in Professional Organiztion</p>
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
                <div class="p-20 h-full w-full">
                    <p class="mb-5 text-sm uppercase tracking-widest">User: {{auth()->user()->first_name . " " . auth()->user()->last_name}}</p>
                    <p class="mb-5 text-xl uppercase tracking-widest">
                        <i class="fa-solid fa-envelope-open text-hau mr-1"></i>
                        Your Application Status:
                        <span class="py-1 px-2 bg-orange-500 text-white rounded">{{auth()->user()->application->status}}</span>
                    </p>

                    <div class="h-full mt-8 grid grid-rows-2 gap-4">
                        <div class="">
                            <p class="uppercase text-lg tracking-widest">Recently Reviewed</p>
                        </div>
                        
                        <div class="">
                            <p class="uppercase text-lg tracking-widest">Recently Checked</p>
                        </div>
                    </div>
                </div>

    </x-faculty.navigation>

    

</x-faculty.layout>