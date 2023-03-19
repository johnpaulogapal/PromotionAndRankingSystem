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
                <div class="pb-5 flex justify-between items-center">
                    <p class="uppercase font-bold text-center text-2xl tracking-widest mb-5">Pending Applications</p>
                    <a href="account/create" class="py-1 px-2 text-white tracking-widest bg-cyan-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-cyan-600 duration-300">
                        <i class="fa-solid fa-plus"></i>
                        Create an Account
                    </a>
                </div>
                
                <table id="dataTable" class="pt-5">
                    <thead class="bg-hau">
                        <tr>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                ID No.
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Name
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Email
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Created on
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Options
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($accounts as $account)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 font-bold text-sm text-center">
                                {{$account->id}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{$account->first_name . ' ' . $account->last_name}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{$account->email}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{date('F d, Y', strtotime($account->created_at))}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </x-admin.navigation>
</x-admin.layout>