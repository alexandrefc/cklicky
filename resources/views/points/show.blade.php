<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    <div class="sm:flex container my-8 mx-auto w-full sm:w-3/5">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="mx-auto text-3xl">
                {{-- {{ $point->title }} --}}
                
            </h2>
        </div>
        
        <div
            class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">
          
          
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('storage/images/loyalty/' . $point->image_path) }}"
                  alt=""
                />
              </div>

              <div class="px-4 py-2 mt-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class=" font-bold text-gray-800 text-lg md:text-2xl mb-2">
                    {{ $point->title }}
                  </h3>
                </div>
                
                <div class="text-md">
                    
                    <p class="mb-6 text-sm md:text-base">
                        {{ $point->description }}                   
                    </p>
                  
                    
                    <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                        {{-- Total points to collect: {{ $point->total_points ?? "" }}  --}}
                        Points collected: {{ $myPoint->points_amount ?? "0" }}/{{ $point->total_points ?? "" }}                  
                    </p>
                    <p class="font-bold text-base mb-1">
                        Campaign details:                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Category: {{ $point->category->name ?? "No Category" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Venue: {{ $point->venue->title ?? "No Venue" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Reward: {{ $reward->title ?? "No reward" }} 
                        @if ($reward)
                            <a href="/coupons/{{ $reward->slug }}">
                                @if($myPoint ? $myPoint->finished : 0)
                                    <span class="text-xs text-indigo-700 italic hover:text-indigo-900 pb-1 mb-3">
                                        See reward ->
                                    </span>
                                @endif
                            </a>  
                        @endif
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        You can collect another point after:
                        {{ $myPoint->user_reset_time ?? "right after"}}               
                    </p>
                    <p class="text-xs md:text-sm mb-3 md:mb-6">
                        Your time to complete all points:
                        {{ $myPoint->user_time_to_redeem ?? "till end of the campaign"}}               
                    </p>
                    
                    <p class="text-xs mb-3 mt-2 md:mb-6">
                        {{ $point->start_date || $point->end_date ? "Campaign is valid between:" : ""}}
                    {{ $point->start_date ? date('j M, Y', strtotime($point->start_date)) : " "}} - {{ $point->end_date ? date('j M, Y', strtotime($point->end_date)) : "" }}
                        
                    </p>
                    <div class="flex space-x-1 mb-2">
                        <div class="flex-1 w=4/5 m-auto text-center">
                            @if (!$myPoint)
                                <form 
                                    action="/points/addtomy/{{ $point->id }}"
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
                                        action="/points/removefrommy/{{ $point->id }}"
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
            
                        @if($myPoint ? $myPoint->finished : 0)
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
                                    action="/points/confirmaddpoints/{{ $point->id }}"
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                            
                                    <button 
                                        type="submit"
                                        class=" bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                                        Add Points
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
                <a href="{{ asset('storage/images/qrcodes/' . $point->qrcode_path) }}">
                    <img
                        class="w-1/2 mx-auto mt-5 mb-3 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('storage/images/qrcodes/' . $point->qrcode_path) }}"
                        alt=""
                    />
                </a>
            </div>
           
            <div class="w-4/5 mt-1 mb-6 mx-auto border-b-2 border-gray-200">
                <br>
            </div>

            <div class="text-md">
                
                
                <p class="font-bold text-xs md:text-base mb-3">
                    General Conditions:                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                Category: {{ $point->category->name ?? "No Category" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                Venue: {{ $point->venue->title ?? "No Venue" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                    Reward: {{ $reward->title ?? "No reward" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                Total points: {{ $point->total_points ?? "" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                    Campaign reset time:
                    {{ $point->reset_time ?? "no limits" }} {{ $point->reset_time ? $point->type_of_reset_time : ""}}                
                </p>
                <p class="text-xs md:text-sm mb-3 md:mb-1">
                    Time to complete all points:
                    {{ $point->x_time_to_redeem ?? "till end of the campaign" }} {{ $point->x_time_to_redeem ? $point->type_of_period_to_redeem : ""}}               
                </p>
                
                <p class="text-xs md:text-sm mb-3 mt-2 md:mb-6">
                    {{ $point->start_date || $point->end_date ? "Campaign is valid between:" : ""}}
                {{ $point->start_date ? date('j M, Y', strtotime($point->start_date)) : " "}} - {{ $point->end_date ? date('j M, Y', strtotime($point->end_date)) : "" }}
                    
                </p>                 
      
            </div>
        
          </div>

      </div>
        
    </div>

</x-app-layout>