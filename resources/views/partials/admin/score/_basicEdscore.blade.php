<div class="grid grid-cols-3 gap-x-8 px-24">
    
    {{-- Faculty Score --}}
    <div class="col-span-2 flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
            
              <table class="min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                  <tr>
                    <th scope="col" class="px-6 py-4">Criteria</th>
                    <th scope="col" class="w-1/4 px-6 py-4">Rating</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Educational Attainment</td>
                    
                    <td class="whitespace-nowrap px-6 py-4">
                        
                       
                           <span class="font-bold">{{$user->score->edu_attain}}</span>

                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Teaching Evaluation Rating</td>
                    
                    <td class="whitespace-nowrap px-6 py-4">
                       
                        <span class="font-bold">{{$user->score->teach_eval}}</span>
                       
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Research</td>
                   
                    <td class="whitespace-nowrap px-6 py-4">
                      
                        <span class="font-bold">{{$user->score->research}}</span>
                       
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Community Service</td>
                   
                    <td class="whitespace-nowrap px-6 py-4">
                      
                        <span class="font-bold">{{$user->score->com_ser}}</span>
                        
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Trainings/Seminars</td>
                    
                    <td class="whitespace-nowrap px-6 py-4">
                       
                        <span class="font-bold">{{$user->score->train_sem}}</span>
                        
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Membership in professional organization</td>
                   
                    <td class="whitespace-nowrap px-6 py-4">
                       
                        <span class="font-bold">{{$user->score->mpo}}</span>
                       
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Professional Examination</td>
                    
                    <td class="whitespace-nowrap px-6 py-4">
                        
                        <span class="font-bold">{{$user->score->prof_exam}}</span>
                        
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Total</td>
                   
                    <td class="whitespace-nowrap px-6 py-4">
                        
                      <span class="font-bold text-lg">
                        {{ 
                        $user->score->edu_attain +
                        $user->score->teach_eval +
                        $user->score->research +
                        $user->score->com_ser +
                        $user->score->train_sem +
                        $user->score->mpo +
                        $user->score->prof_exam
                        }}
                      </span>
                        
                    </td>
                  </tr>
                </tbody>
               
              </table>
              
               
               
              
            </div>
          </div>
        </div>
    </div>

    {{-- Faculty Suggested Rank --}}
    <div class="flex flex-col justify-start mt-12">
      @if($user->score->research < 7)
        <h3 class="font-bold text-3xl tracking-widest">Conclusion</h3>
        <h6 class="mt-5 text-2xl text-red-700 tracking-widest">
          After thorough consideration, it has been determined that the employee does not meet the qualifications and requirements for the promotion.
        </h6>
      @else
        <h3 class="font-bold text-center text-3xl tracking-widest">Faculty Suggested Rank</h3>
        @php
            $total = $user->score->edu_attain + $user->score->teach_eval + $user->score->research + $user->score->com_ser + $user->score->train_sem + $user->score->mpo + $user->score->prof_exam;
        @endphp
        <h6 class="font-bold mt-5 text-center text-3xl text-green-700 tracking-widest">
          {{$user->score->suggestedRank($total)}}
        </h6>
      @endif
    </div>
     
</div>