<div class="p-1 w-full">
    <div class="mt-2 flex flex-col">

        @if(auth()->user()->status == 'resubmit')
        <a href="{{route('profile.show', auth()->user()->id)}}" class="py-2 px-5 border-t-2 border-yellow-700 bg-white shadow-2xl transition ease-in-out hover:scale-110 hover:text-gray-900 hover:bg-gray-300 duration-300 space-y-1">
            <div class="flex justify-between">
                <span class="font-bold text-sm">No. - {{auth()->user()->id}}</span>
                <span class="font-bold text-sm">Submitted On: - {{ date('F d, Y', strtotime(auth()->user()->created_at)) }}</span>
            </div>
            
            <p class="font-bold tracking-widest">Personal Information</p>
        </a>
        @endif

        @if(auth()->user()->application->status == 'resubmit')
        <a href="{{route('profile.show', auth()->user()->id)}}" class="py-2 px-5 border-t-2 border-yellow-700 bg-white shadow-2xl transition ease-in-out hover:scale-110 hover:text-gray-900 hover:bg-gray-300 duration-300 space-y-1">
            <div class="flex justify-between">
                <span class="font-bold text-sm">No. - {{auth()->user()->application->id}}</span>
                <span class="font-bold text-sm">Submitted On: - {{ date('F d, Y', strtotime(auth()->user()->application->created_at)) }}</span>
            </div>
            
            <p class="font-bold tracking-widest">Application Information</p>
        </a>
        @endif

        @foreach (auth()->user()->undergrads as $undergrad)
            @if($undergrad->status == 'resubmit')
            <a href="{{route('edubg')}}" class="py-2 px-5 border-t-2 border-yellow-700 bg-white shadow-2xl transition ease-in-out hover:scale-110 hover:text-gray-900 hover:bg-gray-300 duration-300 space-y-1">
                <div class="flex justify-between">
                    <span class="font-bold text-sm">No. - {{$undergrad->id}}</span>
                    <span class="font-bold text-sm">Submitted On: - {{ date('F d, Y', strtotime($undergrad->created_at)) }}</span>
                </div>
                
                <p class="font-bold tracking-widest">Undergrad Information</p>
            </a>
            @endif
        @endforeach

        @foreach (auth()->user()->masters as $master)
            @if($master->status == 'resubmit')
            <a href="{{route('edubg')}}" class="py-2 px-5 border-t-2 border-yellow-700 bg-white shadow-2xl transition ease-in-out hover:scale-110 hover:text-gray-900 hover:bg-gray-300 duration-300 space-y-1">
                <div class="flex justify-between">
                    <span class="font-bold text-sm">No. - {{$master->id}}</span>
                    <span class="font-bold text-sm">Submitted On: - {{ date('F d, Y', strtotime($master->created_at)) }}</span>
                </div>
                
                <p class="font-bold tracking-widest">Masters Information</p>
            </a>
            @endif
        @endforeach

        @foreach (auth()->user()->phds as $phd)
            @if($phd->status == 'resubmit')
            <a href="{{route('edubg')}}" class="py-2 px-5 border-t-2 border-yellow-700 bg-white shadow-2xl transition ease-in-out hover:scale-110 hover:text-gray-900 hover:bg-gray-300 duration-300 space-y-1">
                <div class="flex justify-between">
                    <span class="font-bold text-sm">No. - {{$phd->id}}</span>
                    <span class="font-bold text-sm">Submitted On: - {{ date('F d, Y', strtotime($phd->created_at)) }}</span>
                </div>
                
                <p class="font-bold tracking-widest">PHD Information</p>
            </a>
            @endif
        @endforeach

        @foreach (auth()->user()->prcs as $prc)
            @if($prc->status == 'resubmit')
            <a href="{{route('edubg')}}" class="py-2 px-5 border-t-2 border-yellow-700 bg-white shadow-2xl transition ease-in-out hover:scale-110 hover:text-gray-900 hover:bg-gray-300 duration-300 space-y-1">
                <div class="flex justify-between">
                    <span class="font-bold text-sm">No. - {{$prc->id}}</span>
                    <span class="font-bold text-sm">Submitted On: - {{ date('F d, Y', strtotime($prc->created_at)) }}</span>
                </div>
                
                <p class="font-bold tracking-widest">PRC License Information</p>
            </a>
            @endif
        @endforeach

        @foreach (auth()->user()->mpos as $mpo)
            @if($mpo->status == 'resubmit')
            <a href="{{route('edubg')}}" class="py-2 px-5 border-t-2 border-yellow-700 bg-white shadow-2xl transition ease-in-out hover:scale-110 hover:text-gray-900 hover:bg-gray-300 duration-300 space-y-1">
                <div class="flex justify-between">
                    <span class="font-bold text-sm">No. - {{$mpo->id}}</span>
                    <span class="font-bold text-sm">Submitted On: - {{ date('F d, Y', strtotime($mpo->created_at)) }}</span>
                </div>
                
                <p class="font-bold tracking-widest">Membership in Professional Organization Information</p>
            </a>
            @endif
        @endforeach

        @foreach (auth()->user()->trainings as $training)
            @if($training->status == 'resubmit')
            <a href="{{route('edubg')}}" class="py-2 px-5 border-t-2 border-yellow-700 bg-white shadow-2xl transition ease-in-out hover:scale-110 hover:text-gray-900 hover:bg-gray-300 duration-300 space-y-1">
                <div class="flex justify-between">
                    <span class="font-bold text-sm">No. - {{$training->id}}</span>
                    <span class="font-bold text-sm">Submitted On: - {{ date('F d, Y', strtotime($training->created_at)) }}</span>
                </div>
                
                <p class="font-bold tracking-widest">Training/Seminars/Webinars Information</p>
            </a>
            @endif
        @endforeach
       

    </div>
</div>