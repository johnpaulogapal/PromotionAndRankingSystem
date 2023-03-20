
<div class="pt-24">
    
    <div class="flex flex-col">
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
                        
                       
                           <span class="font-bold">{{auth()->user()->score->edu_attain}}</span>

                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Teaching Evaluation Rating</td>
                    
                    <td class="whitespace-nowrap px-6 py-4">
                       
                        <span class="font-bold">{{auth()->user()->score->teach_eval}}</span>
                       
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Research</td>
                   
                    <td class="whitespace-nowrap px-6 py-4">
                      
                        <span class="font-bold">{{auth()->user()->score->research}}</span>
                       
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Community Service</td>
                   
                    <td class="whitespace-nowrap px-6 py-4">
                      
                        <span class="font-bold">{{auth()->user()->score->com_ser}}</span>
                        
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Trainings/Seminars</td>
                    
                    <td class="whitespace-nowrap px-6 py-4">
                       
                        <span class="font-bold">{{auth()->user()->score->train_sem}}</span>
                        
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Membership in professional organization</td>
                   
                    <td class="whitespace-nowrap px-6 py-4">
                       
                        <span class="font-bold">{{auth()->user()->score->mpo}}</span>
                       
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Professional Examination</td>
                    
                    <td class="whitespace-nowrap px-6 py-4">
                        
                        <span class="font-bold">{{auth()->user()->score->prof_exam}}</span>
                        
                    </td>
                  </tr>
                  <tr class="border-b dark:border-neutral-500">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">Total</td>
                   
                    <td class="whitespace-nowrap px-6 py-4">
                        
                        <span class="font-bold">{{ auth()->user()->score->total }}</span>
                        
                    </td>
                  </tr>
                </tbody>
               
              </table>
              
               
               
              
            </div>
          </div>
        </div>
    </div>
    
    
</div>