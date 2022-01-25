<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>
    
    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="font-semibold text-xl leading-tight">
              Your Coupon Campaigns
              <a href="/coupons/create" class="">
                <span
                class="text-salmon font-medium text-lg ml-2 hover:underline"
                >+ Create new coupon
              </span>
              </a>
          </h2>
      </div>
      
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
        @foreach ($coupons as $coupon)
        
      <div
          class="flex-none w-3/4 sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
        
          <a href="/coupons/{{ $coupon->slug }}#main" class="">
            <div class="aspect-w-16 aspect-h-9">
              <img
                class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('storage/images/loyalty/' . $coupon->image_path) }}"
                alt=""
              />
            </div>

            

            <div class="px-4 py-2 mt-2">
              <div class="text-lg leading-6 font-medium space-y-1">
                <h3 class="font-bold text-gray-800 text-lg md:text-2xl mb-2">
                  {{ $coupon->title }}
                </h3>
              </div>
              
              

              <div class="text-md">
                  
                <p class="text-sm md:text-lg mb-8 h-10">
                    {{ $coupon->description }}                   
                </p>
                
                
                <p class="font-bold text-base mb-1">
                    Campaign details:                   
                </p>
               
                <p class="text-xs  mb-1">
                  Category: {{ $coupon->category->name ?? "No Category" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                  Venue: {{ $coupon->venue->title ?? "No Venue" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Manager: {{ $coupon->manager_email ?? "No manager" }}                   
                    </p>

                  <p class="text-xs  mb-1">
                    Available through: {{ $coupon->available_through ?? "" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    @foreach ($rewards as $reward)
                          @if ($reward->id == $coupon->reward_id)
                            Reward: {{ $reward->title ?? "No reward" }} 
                                <a href="/coupons/{{ $reward->slug }}">
                                        <span class="text-xs text-indigo-700 italic hover:text-indigo-900 pb-1 mb-3">
                                            See reward ->
                                        </span>
                                </a>  
                          @endif
                    @endforeach
                    @if ($coupon->reward_id == NULL)
                            Reward: No reward 
                    @endif
                  </p>
                  <p class="text-xs  mb-1">
                    YouTube: {{ $coupon->video_yt_id ?? "No video" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Full screen: {{ $coupon->image_fs_path ? "Yes" : "No full screen image" }}                   
                  </p>
                  
                  
                  {{-- <p class="text-xs  mb-1">
                      Campaign reset time:
                      {{ $coupon->reset_time ?? "no limits" }} {{ $coupon->reset_time ? $coupon->type_of_reset_time : ""}}                
                  </p> --}}
                  {{-- <p class="text-xs  mb-3 md:mb-1">
                      Time to redeem coupon
                      {{ $coupon->x_time_to_redeem ?? "till end of the campaign" }} {{ $coupon->x_time_to_redeem ? $coupon->type_of_period_to_redeem : ""}}               
                  </p> --}}
                  <p class="text-xs  mb-1">
                    Gender rules: {{ $coupon->gender ?? "" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Age rules: {{ $coupon->age[0] ?? "" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Scheduled days of the week: {{ $coupon->scheduled_days ? $coupon->scheduled_days->implode(', ') : "" }}                   
                  </p>
                  
                  <p class="text-xs  mb-3 md:mb-1">
                    Scheduled time of the day: 
                    @if ($coupon->start_time || $coupon->end_time)
                      {{ date('H:i', strtotime($coupon->start_time)) }} - {{ date('H:i', strtotime($coupon->end_time)) }}
                    @endif
                  </p>
                  <p class="text-xs  mb-3 mt-2 md:mb-6">
                    Campaign valid between:
                    {{ $coupon->start_date ? date('j M, Y', strtotime($coupon->start_date)) : " "}} - {{ $coupon->end_date ? date('j M, Y', strtotime($coupon->end_date)) : "" }}
                  </p>
                
             
                    
      
                </div>
              </div>
            </a>
                
              
            <div class="flex space-x-1 mb-1 mx-5">
              <div class="flex-1 w=4/5 m-auto text-left">
                  <form 
                  action="/coupons/{{ $coupon->slug }}"
                  method="POST">
                  @csrf
                  @method('delete')
              
                      <button 
                          type="submit"
                          class=" bg-red-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                          Delete
                      </button>
                  </form>
              </div>
              <div class="flex-1 w=4/5 m-auto text-center">
                  <form 
                    action="/coupons/mail/{{ $coupon->id }}"
                    method="POST">
                    @csrf
                    
                      <button 
                          type="submit"
                          class=" bg-pink-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                          Mail
                      </button>
                  </form>
              </div>
  
              <div class="flex-1 w=4/5 m-auto text-right">
                
                    <a 
                        href="/coupons/{{ $coupon->slug }}/edit"
                        class="bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                    Edit
                    </a>
              </div>
            </div>
                  <div class="m-6">
                      <img
                        class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('images/qrcodes/' . $coupon->qrcode_path) }}"
                        alt=""
                      />
                  </div>
              </div>
  
                {{-- @endif --}}
              @endforeach
                
          
        </div>
    </div>
  

</x-app-layout>