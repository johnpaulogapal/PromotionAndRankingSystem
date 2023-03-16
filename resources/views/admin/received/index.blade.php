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