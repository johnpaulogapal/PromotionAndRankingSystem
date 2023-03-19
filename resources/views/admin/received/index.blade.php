<x-admin.layout>
    <x-admin.navigation>
       
        
        <!-- <table> -->
            <div class="p-24 h-screen w-full">
                <p class="uppercase font-bold text-center text-2xl tracking-widest mb-5">Received Applications</p>
                <table id="dataTable" class="pt-5">
                    <thead class="bg-hau">
                        <tr>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                App No.
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Applicant
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Submitted on
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                No. to Verify
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                No. of Resubmit
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                No. of Verified
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Options
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($receivedApplications as $receivedApplication)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 font-bold text-sm text-center">
                                {{$receivedApplication->id}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{$receivedApplication->user->first_name . ' ' . $receivedApplication->user->last_name}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{$receivedApplication->user->created_at->format('F d, Y')}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                @php
                               
                                    if($receivedApplication->user->status == 'pending'){
                                        $userPending = 1;
                                    }
                                    else 
                                        $userPending = 0;

                                    if($receivedApplication->status == 'pending'){
                                        $applicationPending = 1;
                                    }
                                    else 
                                        $applicationPending = 0;

                                @endphp 
                                <span class="p-1 bg-orange-700 text-white rounded">
                                {{
                                    $userPending +
                                    $applicationPending +
                                    count($receivedApplication->user->undergrads->where('status', 'pending')) +
                                    count($receivedApplication->user->masters->where('status', 'pending')) +
                                    count($receivedApplication->user->phds->where('status', 'pending')) +
                                    count($receivedApplication->user->prcs->where('status', 'pending')) +
                                    count($receivedApplication->user->mpos->where('status', 'pending')) +
                                    count($receivedApplication->user->trainings->where('status', 'pending'))
                                }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                @php
                                    if($receivedApplication->user->status == 'resubmit')
                                        $userResubmit = 1;
                                    else 
                                        $userResubmit = 0;

                                    if($receivedApplication->status == 'resubmit')
                                        $applicationResubmit = 1;
                                    else 
                                        $applicationResubmit = 0;
                                @endphp
                                <span class="p-1 bg-red-700 text-white rounded">
                                {{
                                    $userResubmit +
                                    $applicationResubmit +
                                    count($receivedApplication->user->undergrads->where('status', 'resubmit')) +
                                    count($receivedApplication->user->masters->where('status', 'resubmit')) +
                                    count($receivedApplication->user->phds->where('status', 'resubmit')) +
                                    count($receivedApplication->user->prcs->where('status', 'resubmit')) +
                                    count($receivedApplication->user->mpos->where('status', 'resubmit')) +
                                    count($receivedApplication->user->trainings->where('status', 'resubmit'))
                                }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                @php
                                if($receivedApplication->user->status == 'verified')
                                    $userApproved = 1;
                                else 
                                    $userApproved = 0;

                                if($receivedApplication->status == 'verified')
                                    $applicationApproved = 1;
                                else 
                                    $applicationApproved = 0;
                                @endphp
                                <span class="p-1 bg-green-700 text-white rounded">
                                {{
                                    $userApproved +
                                    $applicationApproved +
                                    count($receivedApplication->user->undergrads->where('status', 'approved')) +
                                    count($receivedApplication->user->masters->where('status', 'approved')) +
                                    count($receivedApplication->user->phds->where('status', 'approved')) +
                                    count($receivedApplication->user->prcs->where('status', 'approved')) +
                                    count($receivedApplication->user->mpos->where('status', 'approved')) +
                                    count($receivedApplication->user->trainings->where('status', 'approved'))
                                }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                <form action="{{route('received.show', $receivedApplication->user->id)}}">
                                    <button class="p-1 text-white tracking-widest bg-cyan-500 rounded shadow-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-cyan-600 duration-300">
                                        View
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </x-admin.navigation>
</x-admin.layout>