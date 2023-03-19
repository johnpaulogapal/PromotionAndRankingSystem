<x-admin.layout>
    <x-admin.navigation>
        @if(session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
                <p class="text-lg tracking-widest">
                    <i class="fa-solid fa-check mr-2"></i>{{session('message')}}
                </p>
            </div>
        @endif   
        
        <!-- <table> -->
            <div class="p-24 h-screen w-full">
                <p class="uppercase font-bold text-center text-2xl tracking-widest mb-5">Approved Applications</p>
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
                        @foreach ($approvedApplications as $approvedApplication)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 font-bold text-sm text-center">
                                {{$approvedApplication->id}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{$approvedApplication->user->first_name . ' ' . $approvedApplication->user->last_name}} ({{$approvedApplication->user->email}})
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{$approvedApplication->user->created_at->format('F d, Y')}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                Grade
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </x-admin.navigation>
</x-admin.layout>