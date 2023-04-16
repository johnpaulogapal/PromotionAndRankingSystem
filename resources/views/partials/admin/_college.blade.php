<div class="flex flex-col mb-10">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <form method="POST" action="{{route('admin.scoreUpdate', [ 'user' => $user->id, 'score' => $user->score->id])}}" class="overflow-hidden">
        @csrf
        @method('PUT')
          <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
                <th scope="col" class="px-6 py-4">Criteria</th>
                <th scope="col" class="px-6 py-4">Weight</th>
                <th scope="col" class="w-1/4 px-6 py-4">Rating</th>
                <th scope="col" class="w-1/4 px-6 py-4">Remarks (Met/Not)</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-6 py-4 font-medium">Educational Attainment</td>
                <td class="whitespace-nowrap px-6 py-4">30</td>
                <td class="whitespace-nowrap px-6 py-4">
                    
                    @if(empty($user->score->edu_attain))
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider"></label>
                            <input name="edu_attain" type="number" class="w-1/4 py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('edu_attain')}}" min="1" max="30" required>
                            @error('edu_attain')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    @else
                       <span class="font-bold">{{$user->score->edu_attain}}</span>
                    @endif
                </td>
                <td>
                    @if(empty($user->score->masters))
                        <div class="flex gap-x-4">
                            <div class="mx-5">
                                <input name="masters" type="radio" value=2 class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500" required>
                                <label for="" class="text-hau tracking-wider">Met</label>
                            </div>   
                            <div class="">
                                <input name="masters" type="radio" value=1 class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500">
                                <label for="" class="text-hau tracking-wider">Not</label>
                            </div>
                            @error('masters')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    @else
                        <span class="font-bold mx-5">{{$user->score->masters == 2 ? 'Met' : 'Not'}}</span>
                    @endif
                </td>
              </tr>
              <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-6 py-4 font-medium">Teaching Evaluation Rating</td>
                <td class="whitespace-nowrap px-6 py-4">25</td>
                <td class="whitespace-nowrap px-6 py-4">
                    @if(empty($user->score->teach_eval))
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider"></label>
                            <input name="teach_eval" type="number" class="w-1/4 py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('teach_eval')}}" min="1" max="25" required>
                            @error('teach_eval')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    @else
                       <span class="font-bold">{{$user->score->teach_eval}}</span>
                    @endif
                </td>
                <td>
                    @if(empty($user->score->teach_eval_min))
                        <div class="flex gap-x-4">
                            <div class="mx-5">
                                <input name="teach_eval_min" type="radio" value=2 class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500" required>
                                <label for="" class="text-hau tracking-wider">Met</label>
                            </div>   
                            <div class="">
                                <input name="teach_eval_min" type="radio" value=1 class="py-1.5 px-1.5 border border-hau rounded-full appearance-none checked:bg-green-500 checked:border-green-500">
                                <label for="" class="text-hau tracking-wider">Not</label>
                            </div>
                            @error('teach_eval_min')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    @else
                        <span class="font-bold mx-5">{{$user->score->teach_eval_min == 2 ? 'Met' : 'Not'}}</span>
                    @endif
                </td>
              </tr>
              <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-6 py-4 font-medium">Trainings/Seminars</td>
                <td class="whitespace-nowrap px-6 py-4">8</td>
                <td class="whitespace-nowrap px-6 py-4">
                    @if(empty($user->score->train_sem))
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider"></label>
                            <input name="train_sem" type="number" class="w-1/4 py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('train_sem')}}" min="1" max="8" required>
                            @error('train_sem')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    @else
                        <span class="font-bold">{{$user->score->train_sem}}</span>
                    @endif
                </td>
              </tr>
              <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-6 py-4 font-medium">Membership in Professional Organization or Professional Examination</td>
                <td class="whitespace-nowrap px-6 py-4">2</td>
                <td class="whitespace-nowrap px-6 py-4">
                    @if(empty($user->score->mpo))
                        <div class="flex flex-col justify-center gap-1">
                            <label for="" class="font-bold text-hau text-sm tracking-wider"></label>
                            <input name="mpo" type="number" class="w-1/4 py-0.5 px-2 border border-hau rounded caret-hau outline-hau" value="{{old('mpo')}}" min="1" max="2" required>
                            @error('mpo')
                                <p class="font-bold text-red-500 mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    @else
                        <span class="font-bold">{{$user->score->mpo}}</span>
                    @endif
                </td>
              </tr>
           
          </table>
          <div class="w-full pt-5 px-5 flex justify-end">
            @if(empty($user->score->edu_attain))
                <button
                type="button"
                data-te-toggle="modal"
                data-te-target="#scoreSubmit"
                data-te-ripple-init
                data-te-ripple-color="light" 
                class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">Submit</button>
            
            @else
                {{-- <a
                href="{{route('admin.scoreEdit', $user->id)}}"
                class="py-1 px-2 uppercase text-white tracking-widest bg-yellow-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-yellow-600 duration-300">Edit</a> --}}
            @endif
          </div>
          {{-- [START] Submit Score Modal Modal --}}
            <div
            data-te-modal-init
            class="fixed pl-60 top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="scoreSubmit"
            tabindex="-1"
            aria-labelledby="scoreSubmit"
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
                            <p class="font-bold uppercase tracking-widest">Are you sure you want to submit the score?</p>
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
                            <button
                            type="submit"
                            class="py-1 px-2 uppercase text-white tracking-widest bg-green-700 rounded shadow-lg transition ease-in-out delay-150 hover:bg-green-600 duration-300">
                            <i class="fa-solid fa-check mr-1"></i>Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- [END] Delete Modal --}}
        </form>
      </div>
    </div>
</div>

