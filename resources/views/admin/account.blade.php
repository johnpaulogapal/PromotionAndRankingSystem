<x-admin.layout>
    <x-admin.navigation>
        @if(session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="z-50 fixed m-10 bottom-0 right-0 bg-gray-200 border-l-8 border-green-700 text-green-700 px-5 py-2 shadow-lg">
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
                                <button 
                                type="button"
                                data-te-toggle="modal"
                                data-te-target="#accountDestroy{{$account->id}}"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300">
                                    Delete
                                </button>

                                <div
                                    data-te-modal-init
                                    class="fixed pl-60 top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="accountDestroy{{$account->id}}"
                                    tabindex="-1"
                                    aria-labelledby="accountDestroy"
                                    aria-hidden="true">
                                    <div
                                    data-te-modal-dialog-ref
                                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                        <div
                                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                                            <div
                                                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-t-2 border-hau p-4">
                                                <h5
                                                class="text-3xl font-medium leading-normal text-neutral-800"
                                                id="exampleModalLabel">
                                                    <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                                                </h5>
                                                <button
                                                type="button"
                                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                data-te-modal-dismiss
                                                aria-label="Close">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="h-6 w-6">
                                                    <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                </button>
                                            </div>
                                            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                                <p class="font-bold uppercase text-sm tracking-widest">Are you sure you want to delete this account</p>
                                            </div>
                                            <div
                                                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-opacity-100 p-4 space-x-4">
                                                <button
                                                type="button"
                                                class="py-1 px-2 uppercase text-white tracking-widest bg-red-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-red-600 duration-300"
                                                data-te-modal-dismiss
                                                data-te-ripple-init
                                                data-te-ripple-color="light">
                                                    <i class="fa-solid fa-xmark mr-1"></i>Cancel
                                                </button>
                                                
                                                <form method="POST" action="{{route('admin.accountDestroy', $account->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                        <button
                                                        type="submit"
                                                        class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300"
                                                        data-te-ripple-init
                                                        data-te-ripple-color="light">
                                                        <i class="fa-solid fa-check mr-1"></i>Confirm
                                                        </button>
                                                    </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </x-admin.navigation>
</x-admin.layout>