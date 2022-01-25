<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    <div class="sm:flex container my-8 mx-auto w-full sm:w-3/5">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="mx-auto text-3xl">
                {{-- {{ $stamp->title }} --}}
                
            </h2>
        </div>
        
        
        {{-- <div
          id="scrollContainer"
          class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
        > --}}

        <div
            class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">
          
          
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('storage/images/loyalty/' . $stamp->image_path) }}"
                  alt=""
                />
              </div>

              <div class="px-4 py-2 mt-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class=" font-bold text-gray-800 text-lg md:text-2xl mb-2">
                    {{ $stamp->title }}
                  </h3>
                </div>
                
                <div class="text-md">
                    
                    <p class="mb-6 text-sm md:text-base">
                        {{ $stamp->description }}                   
                    </p>
                  
                    
                    @if ($myStamp)
                            @for ($i = 0; $i < $myStamp->stamps_amount; $i++)
                                <div class="inline-flex border-2 border-pink-500 rounded-full h-10 w-10 items-center justify-center text-pink-500 m-1">
                                    <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                    </svg>
                                </div>
                            @endfor

                            @for ($i = 0; $i < ($stamp->total_stamps - $myStamp->stamps_amount); $i++)
                                <div class="inline-flex border-2 border-gray-300 rounded-full h-10 w-10 items-center justify-center text-transparent m-1">
                                    <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                    </svg>
                                </div>
                            @endfor
                    @else
                        @for ($i = 0; $i < $stamp->total_stamps; $i++)
                            <div class="inline-flex border-2 border-gray-300 rounded-full h-10 w-10 items-center justify-center text-transparent m-1">
                                <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                </svg>
                            </div>
                        @endfor
                    @endif
                    <p class="font-bold text-base mb-1 mt-4">
                        Campaign details:                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Category: {{ $stamp->category->name ?? "No Category" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Venue: {{ $stamp->venue->title ?? "No Venue" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Reward: {{ $reward->title ?? "No reward" }} 
                        @if ($reward ?? '')
                            <a href="/coupons/{{ $reward->slug }}">
                                @if($myStamp ? $myStamp->finished : 0)
                                    <span class="text-xs text-indigo-700 italic hover:text-indigo-900 pb-1 mb-3">
                                        See reward ->
                                    </span>
                                @endif
                            </a>  
                        @endif
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Stamps to collect per purchase: {{ $stamp->add_x_stamps ?? "" }}                   
                    </p>
                    
                    <p class="text-xs md:text-sm mb-1">
                        You can collect another stamp after:
                        {{ $myStamp->user_reset_time ?? "right after"}}               
                    </p>
                    <p class="text-xs md:text-sm mb-3 md:mb-6">
                        Your time to complete all stamps:
                        {{ $myStamp->user_time_to_redeem ?? "till end of the campaign"}}               
                    </p>
                    
                    <p class="text-xs mb-3 mt-2 md:mb-6">
                        {{ $stamp->start_date || $stamp->end_date ? "Campaign is valid between:" : ""}}
                    {{ $stamp->start_date ? date('j M, Y', strtotime($stamp->start_date)) : " "}} - {{ $stamp->end_date ? date('j M, Y', strtotime($stamp->end_date)) : "" }}
                        
                    </p>
                    <div class="flex space-x-1 mb-2">
                        <div class="flex-1 w=4/5 m-auto text-center">
                            @if (!$myStamp)
                                <form 
                                    action="/stamps/addtomy/{{ $stamp->id }}"
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                            
                                    <button 
                                        type="submit"
                                        class="bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                                        Add to My
                                    </button>
                                </form>
                            @else
                                <div class="flex-1 w=4/5 m-auto text-center">
                                    <form 
                                        action="/stamps/removefrommy/{{ $stamp->id }}"
                                        method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                
                                        <button 
                                            type="submit"
                                            class=" bg-red-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                                            Remove from my list
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
            
                        @if($myStamp ? $myStamp->finished : 0)
                            <div class="flex-1 w=4/5 m-auto text-center">
                                    <button 
                                        type="submit"
                                        class=" cursor-text bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl opacity-50 inactive">
                                        Finished
                                    </button>            
                            </div>
                        @else
                            <div class="flex-1 w=4/5 m-auto text-center">
                                <form 
                                    action="/stamps/confirmaddstamps/{{ $stamp->id }}"
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                            
                                    <button 
                                        type="submit"
                                        class=" bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                                        Stamp me
                                    </button>            
                                </form>
                            </div>
                        @endif 
                    </div>
                   
                </div>

              </div>
  
          </div>

          
        <div
        class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">
      
          <div class="px-4 py-2 mt-2">

            <div class="my-5">
                <a href="{{ asset('storage/images/qrcodes/' . $stamp->qrcode_path) }}">
                    <img
                        class="w-1/2 mx-auto mt-5 mb-3 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('storage/images/qrcodes/' . $stamp->qrcode_path) }}"
                        alt=""
                    />
                </a>
            </div>
           
            <div class="w-4/5 mt-1 mb-6 mx-auto border-b-2 border-gray-200">
                <br>
            </div>

            <div class="text-md">
                
                
                <p class="font-bold text-xs md:text-base mb-3">
                    General terms:                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                Category: {{ $stamp->category->name ?? "No Category" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                Venue: {{ $stamp->venue->title ?? "No Venue" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                    Reward: {{ $reward->title ?? "No reward" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                stamps to collect per purchase: {{ $stamp->add_x_stamps ?? "" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                Total stamps: {{ $stamp->total_stamps ?? "" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                    Campaign reset time:
                    {{ $stamp->reset_time ?? "no limits" }} {{ $stamp->reset_time ? $stamp->type_of_reset_time : ""}}                
                </p>
                <p class="text-xs md:text-sm mb-3 md:mb-1">
                    Time to complete all stamps:
                    {{ $stamp->x_time_to_redeem ?? "till end of the campaign" }} {{ $stamp->x_time_to_redeem ? $stamp->type_of_period_to_redeem : ""}}               
                </p>
                
               
                <p class="text-xs md:text-sm mb-3 mt-2 md:mb-6">
                    {{ $stamp->start_date || $stamp->end_date ? "Campaign is valid between:" : ""}}
                {{ $stamp->start_date ? date('j M, Y', strtotime($stamp->start_date)) : " "}} - {{ $stamp->end_date ? date('j M, Y', strtotime($stamp->end_date)) : "" }}
                    
                </p>                 
                
      
            </div>

               
          </div>

      </div>
          
    
      </div>

    
          
        
   

    




</x-app-layout>