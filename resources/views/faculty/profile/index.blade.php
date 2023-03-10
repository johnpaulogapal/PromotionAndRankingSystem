<x-faculty.layout>
    <x-faculty.navigation>
    @if(session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-100 border-l-4 border-green-700 text-green-700 px-5 py-2 shadow-lg">
            <p class="text-lg tracking-widest">
                <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
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
                        <p class="mb-5 text-xl uppercase tracking-widest">Requirements to be submitted</p>
                        <p class="mb-1 text-sm uppercase tracking-widest">Progress</p>
                        <div class="mb-5 h-1 w-full bg-neutral-200"> 
                            @php
                                $rating = '';
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
                                
                                if($total === 0){
                                    $rating = 'w-1/12';
                                }
                                elseif($total === 1){
                                    $rating = 'w-1/4';
                                }
                                elseif($total === 2){
                                    $rating = 'w-1/3';
                                }
                                elseif($total === 3){
                                    $rating = 'w-1/2';
                                }
                                elseif($total === 4){
                                    $rating = 'w-3/4';
                                }
                                elseif($total === 5){
                                    $rating = 'w-4/5';
                                }
                                elseif($total > 5){
                                    $rating = 'w-full';
                                }
                                else
                                    $rating = '';
                            @endphp
                            <div class="h-1 bg-green-500 {{$rating}}"></div>
                        </div>
                        <div class="flex flex-col gap-y-4">

                            <div class="py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-circle-check text-xl text-green-500 mr-5"></i>
                                    <p class="tracking-widest">Personal Information</p>
                                </div>
                                <a href="{{route('profile.show', auth()->user()->id)}}" class="py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                    View
                                </a>
                            </div>
                            <div class="py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div id="edubg" class="flex items-center">
                                    @if(count(auth()->user()->undergrads) > 0 && count(auth()->user()->masters) > 0 && count(auth()->user()->phds) > 0)
                                        <i class="fa-solid fa-circle-check text-xl text-green-500 mr-5"></i>
                                    @else
                                        <i class="fa-solid fa-circle-xmark text-xl text-red-500 mr-5"></i>
                                    @endif
                                    <p class="tracking-widest">Educational Background</p>
                                </div>
                                <i id="edubgOpen" class="fa-solid fa-chevron-down mr-2 cursor-pointer"></i>
                                <i id="edubgClose" class="self-end fa-solid fa-chevron-up mr-2 cursor-pointer hidden"></i>
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
                                </div>
                            </div>
                            
                            
                            <div class="py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div class="flex items-center ">
                                    <i class="fa-solid fa-circle-{{ count(auth()->user()->prcs) > 0 ? 'check text-green-500' : 'xmark text-red-500' }}  text-xl mr-5"></i>
                                    <p class="tracking-widest">PRC License</p>
                                </div>
                                <a href="{{route('prc.index')}}" class="py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                    Submit
                                </a>
                            </div>
                            <div class="py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div class="flex items-center ">
                                    <i class="fa-solid fa-circle-{{ count(auth()->user()->mpos) > 0 ? 'check text-green-500' : 'xmark text-red-500' }} text-xl mr-5"></i>
                                    <p class="tracking-widest">Membership in Professional Organiztion</p>
                                </div>
                                <a href="{{route('mpo.index')}}" class="py-1 px-2 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                    Submit
                                </a>
                            </div>
                            <div class="ww py-3 px-5 flex justify-between items-center gap-x-2 bg-white rounded-lg shadow-2xl">
                                <div class="flex items-center ">
                                    <i class="fa-solid fa-circle-{{ count(auth()->user()->trainings) > 0 ? 'check text-green-500' : 'xmark text-red-500' }} text-xl mr-5"></i>
                                    <p class="tracking-widest">Trainings/Seminars/Webinars</p>
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
                    <p class="mb-5 text-sm uppercase tracking-widest">User - {{auth()->user()->first_name}}</p>
                    <p class="mb-5 text-xl uppercase tracking-widest">Your Application Status</p>

                    <div class="grid grid-cols-2 gap-8">
                        <div class="h-48 p-5 rounded-lg shadow-2xl space-y-4">                    
                            <span class="py-1 px-2 bg-orange-500 text-sm text-white tracking-widest rounded-lg">Pending</span>
                            <div class="flex flex-col gap-y-2">
                                <p class="text-sm tracking-widest">Educational Background</p>
                                <p class="text-xs tracking-widest">Submitted on:</p>
                                <p class="text-xs tracking-widest">Checked on:</p>
                            </div>
                        </div>
                        <div class="h-48 p-5 rounded-lg shadow-2xl space-y-4">                    
                            <span class="py-1 px-2 bg-orange-500 text-sm text-white tracking-widest rounded-lg">Pending</span>
                            <div class="flex flex-col gap-y-2">
                                <p class="text-sm tracking-widest">PRC License</p>
                                <p class="text-xs tracking-widest">Submitted on:</p>
                                <p class="text-xs tracking-widest">Checked on:</p>
                            </div>
                        </div>
                        <div class="h-48 p-5 rounded-lg shadow-2xl space-y-4">                    
                            <span class="py-1 px-2 bg-orange-500 text-sm text-white tracking-widest rounded-lg">Pending</span>
                            <div class="flex flex-col gap-y-2">
                                <p class="text-sm tracking-widest">Membership in Profressional Organization</p>
                                <p class="text-xs tracking-widest">Submitted on:</p>
                                <p class="text-xs tracking-widest">Checked on:</p>
                            </div>
                        </div>
                        <div class="h-48 p-5 rounded-lg shadow-2xl space-y-4">                    
                            <span class="py-1 px-2 bg-orange-500 text-sm text-white tracking-widest rounded-lg">Pending</span>
                            <div class="flex flex-col gap-y-2">
                                <p class="text-sm tracking-widest">Trainings/Seminars/Webinars</p>
                                <p class="text-xs tracking-widest">Submitted on:</p>
                                <p class="text-xs tracking-widest">Checked on:</p>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </x-faculty.navigation>

    

</x-faculty.layout>