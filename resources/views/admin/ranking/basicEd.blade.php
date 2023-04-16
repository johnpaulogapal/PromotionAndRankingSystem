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
                <div class="pb-5 flex justify-center">
                    <p class="uppercase font-bold text-center text-2xl tracking-widest mb-5">Basic Education Faculty Ranking</p>
                </div>
                
                <table id="dataTable" class="pt-5">
                    <thead class="bg-hau">
                        <tr>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                ID No.
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Full Name
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Email
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Created on
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Scores
                            </th>
                            <th class="p-8 uppercase text-sm text-white tracking-widest">
                                Option
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($users as $user)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 font-bold text-sm text-center">
                                {{$user->id}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{$user->first_name . ' ' . $user->last_name}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{$user->email}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                {{date('F d, Y', strtotime($user->created_at))}}
                            </td>
                            <td class="px-6 py-4 font-bold text-center tracking-widest">
                                @if($user->score->status == 'approved')
                                    {{ 
                                    $user->score->edu_attain +
                                    $user->score->teach_eval +
                                    $user->score->research +
                                    $user->score->com_ser +
                                    $user->score->train_sem +
                                    $user->score->mpo +
                                    $user->score->prof_exam
                                    }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="flex justify-center">
                                <form action="{{route('admin.basicEd.show', $user->id)}}">
                                @csrf
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