<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>

    
    <div id="main" class="sm:flex container my-8 mx-auto w-full sm:w-3/5">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="mx-auto text-3xl">
                {{-- {{ $coupon->title }} --}}
                
            </h2>
        </div>
        
        <div
            class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">
          
          
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('storage/images/loyalty/' . $coupon->image_path) }}"
                  alt=""
                />
              </div>

              <div class="px-4 py-2 mt-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class=" font-bold text-gray-800 text-lg md:text-2xl mb-2">
                    {{ $coupon->title }}
                  </h3>
                </div>
                
                <div class="text-md">
                    
                    <p class="mb-6 text-sm md:text-base">
                        {{ $coupon->description }}                   
                    </p>
                  
                    
                    @if($isCouponRedeemed ?? 0)
                    <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl opacity-50">
                      {{"Redeemed"}}                  
                    </p>
                    @else
                    <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                      {{ "Ready to reedem" }}                  
                    </p>
                    @endif
                    <p class="font-bold text-base mb-1">
                        Campaign details:                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Category: {{ $coupon->category->name ?? "No Category" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Venue: {{ $coupon->venue->title ?? "No Venue" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                        Reward: {{ $reward->title ?? "No reward" }}                   
                    </p>
                    
                    {{-- <p class="text-xs md:text-sm mb-1">
                        You can collect another coupon after:
                        {{ $myCoupon->user_reset_time ?? "right after"}}               
                    </p> --}}
                    <p class="text-xs md:text-sm mb-3 md:mb-6">
                        Your time to redeem coupon:
                        {{ $myCoupon->user_time_to_redeem ?? "till end of the campaign"}}               
                    </p>
                    
                    <p class="text-xs mb-3 mt-2 md:mb-6">
                        {{ $coupon->start_date || $coupon->end_date ? "Campaign is valid between:" : ""}}
                    {{ $coupon->start_date ? date('j M, Y', strtotime($coupon->start_date)) : " "}} - {{ $coupon->end_date ? date('j M, Y', strtotime($coupon->end_date)) : "" }}
                        
                    </p>
                    <div class="flex space-x-1 mb-2">
                        {{-- <div class="flex-1 w=4/5 m-auto text-center">
                            @if ($myCoupon ?? 0)
                                <div class="flex-1 w=4/5 m-auto text-center">
                                    <form 
                                        action="/coupons/removefrommy/{{ $coupon->id }}"
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
                            @else
                                <form 
                                    action="/coupons/addtomy/{{ $coupon->id }}"
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                            
                                    <button 
                                        type="submit"
                                        class="bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                                        Add to My
                                    </button>
                                </form>
                            @endif
                        </div> --}}

                        @livewire('add-remove-from-my-button', ['model' => 'coupon', 'campaign' => $coupon])
            
                        @if($isCouponRedeemed ?? 0)
                            <div class="flex-1 w=4/5 m-auto text-center">
                                    <button 
                                        type="submit"
                                        class=" cursor-text bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl opacity-50 inactive">
                                        Redeemed
                                    </button>            
                            </div>
                        @else
                            <div class="flex-1 w=4/5 m-auto text-center">
                                <form 
                                    action="/coupons/confirmredeem/{{ $coupon->id }}"
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                            
                                    <button 
                                        type="submit"
                                        class=" bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                                        Redeem
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
                <a href="{{ asset('storage/images/qrcodes/' . $coupon->qrcode_path) }}">
                    <img
                        class="w-1/2 mx-auto mt-5 mb-3 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('storage/images/qrcodes/' . $coupon->qrcode_path) }}"
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
                Category: {{ $coupon->category->name ?? "No Category" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                Venue: {{ $coupon->venue->title ?? "No Venue" }}                   
                </p>
                <p class="text-xs md:text-sm mb-1">
                    Reward: {{ $reward->title ?? "No reward" }}                   
                </p>
                
                <p class="text-xs md:text-sm mb-1">
                    Campaign reset time:
                    {{ $coupon->reset_time ?? "no limits" }} {{ $coupon->reset_time ? $coupon->type_of_reset_time : ""}}                
                </p>
                <p class="text-xs md:text-sm mb-3 md:mb-1">
                    Time to complete all coupons:
                    {{ $coupon->x_time_to_redeem ?? "till end of the campaign" }} {{ $coupon->x_time_to_redeem ? $coupon->type_of_period_to_redeem : ""}}               
                </p>
                
               
                <p class="text-xs md:text-sm mb-3 mt-2 md:mb-6">
                    {{ $coupon->start_date || $coupon->end_date ? "Campaign is valid between:" : ""}}
                {{ $coupon->start_date ? date('j M, Y', strtotime($coupon->start_date)) : " "}} - {{ $coupon->end_date ? date('j M, Y', strtotime($coupon->end_date)) : "" }}
                    
                </p>                 
      
            </div>
        
          </div>

      </div>
        
    </div>


</x-app-layout>