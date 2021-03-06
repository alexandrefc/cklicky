<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="font-semibold text-xl leading-tight">
              My point campaigns
              
          </h2>
      </div>
      
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
      @foreach ($myPoints as $myPoint)
              @if (isset(Auth::user()->id) && Auth::user()->id == $myPoint->user_id)
                  @foreach ($points as $point)
                      @if ($myPoint->point_id == $point->id)
      
      <div
          class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
        
          <a href="/points/{{ $point->slug }}" class="">
            <div class="aspect-w-16 aspect-h-9">
              <img
                class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('storage/images/loyalty/' . $point->image_path) }}"
                alt=""
              />
            </div>

            

            <div class="px-4 py-2 mt-2">
              <div class="text-lg leading-6 font-medium space-y-1">
                <h3 class="font-bold text-gray-800 text-lg md:text-2xl mb-2">
                  {{ $point->title }}
                </h3>
              </div>
              
              <div class="text-md">
                  
                  <p class="text-sm md:text-lg mb-8 h-10">
                      {{ $point->description }}                   
                  </p>
                  
                  
                  <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                    Points collected: {{ $myPoint->points_amount ?? "0" }}/{{ $point->total_points ?? "" }}                   
                  </p>
                  {{-- <p class="font-bold text-base mb-1">
                      Campaign details:                   
                  </p> --}}
                  {{-- <p class="text-xs md:text-sm mb-1">
                  Category: {{ $point->category->name ?? "No Category" }}                   
                  </p> --}}
                  <p class="text-xs mb-1 mt-6">
                  Available in: {{ $point->venue->title ?? "No Venue" }}                   
                  </p>
                  {{-- <p class="text-xs md:text-sm mb-1">
                    Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                  </p> --}}
                  <p class="text-xs mb-3 md:mb-6">
                    Time to collect all points:
                    {{ $myPoint->user_time_to_redeem ? date('j M, Y', strtotime($myPoint->user_time_to_redeem)) : "till end of the campaign"}}               
                  </p>
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    {{ $point->start_date || $point->end_date ? "Valid between:" : ""}}
                    {{ $point->start_date ? date('j M, Y', strtotime($point->start_date)) : " "}} - {{ $point->end_date ? date('j M, Y', strtotime($point->end_date)) : "" }}                 
                  </p>
                </a>
                  
                  {{-- <p class="text-sm mb-1">
                  Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  
                  
                  {{-- <span class="">
                  <a 
                      href="/points/{{ $point->slug }}"
                      class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                  Read more
                  </a>
                  </span>
                  
                  <span class="float-right">
                      <a 
                          href="/points/{{ $point->slug }}/edit"
                          class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                      Edit
                      </a>
                  </span> --}}
                  

              

              {{-- @if($point->id == $myPoints->point_id)
                <span class="float-right">
                  <form 
                      action="/points/addtomy/{{ $point->id }}"
                      method="POST">
                      @csrf

                      <button 
                          class="text-green-500 pr-3"
                          type="submit">
                          Add to favourites
                      </button>

                  </form>
                </span>
              @else
              <span class="float-right">
                <form 
                    action="/points/addtomy/{{ $point->id }}"
                    method="POST">
                    @csrf

                    <button 
                        class="text-green-500 pr-3"
                        type="submit">
                        Add to favourites
                    </button>

                </form>
              </span>
              @endif --}}
              

              {{-- <span class="float-right">
                  <form 
                      action="/points/{{ $point->slug }}"
                      method="POST">
                      @csrf
                      @method('delete')

                      <button 
                          class="text-red-500 pr-3"
                          type="submit">
                          Delete
                      </button>

                  </form>
              </span> --}}
              {{-- <div class="w-4/5 mb-5 mx-auto border-b-2 border-gray-200">
                  <br>
              </div> --}}
              <div class="flex space-x-1 mb-1">
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
    
                @if($myPoint->finished)
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

                {{-- <div class="flex-1 w=4/5 m-auto text-center">
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
                </div> --}}
              </div>
              
              
        
              </div>

                  {{-- <div class="aspect-w-16 aspect-h-9">
                      <img
                      class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                      src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
                      alt=""
                      />
                  </div> --}}
            </div>

          
         
            
          
      
        </div>

        @endif
            @endforeach
              @endif
                @endforeach
        
      </div>
  </div>

  <div class="container my-8 mx-8">
        
    <div class="flex justify-between mb-4">
        <h2 class="font-semibold text-xl leading-tight">
            My Coupons 
            
        </h2>
    </div>
    
    
    <div
      id="scrollContainer"
      class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
    >
    @foreach ($myCoupons as $myCoupon)
            @if (isset(Auth::user()->id) && Auth::user()->id == $myCoupon->user_id && $myCoupon->redeemed == 0)
                @foreach ($coupons as $coupon)
                    @if ($myCoupon->coupon_id == $coupon->id)
    
    <div
        class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
      
        <a href="/coupons/{{ $coupon->slug }}" class="">
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
                
                @if($myCoupon->redeemed)
                <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl opacity-50">
                  {{ $myCoupon->redeemed ? "Redeemed" : "Ready to redeem" }}                  
                </p>
                @else
                <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                  {{ $myCoupon->redeemed ? "Redeemed" : "Ready to redeem" }}                  
                </p>
                @endif
                {{-- <p class="font-bold text-base mb-1">
                    Campaign details:                   
                </p> --}}
                {{-- <p class="text-xs md:text-sm mb-1">
                Category: {{ $point->category->name ?? "No Category" }}                   
                </p> --}}
                <p class="text-xs mb-1 mt-6">
                Available in: {{ $coupon->venue->title ?? "No Venue" }}                   
                </p>
                {{-- <p class="text-xs md:text-sm mb-1">
                  Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                </p> --}}
                <p class="text-xs mb-3 md:mb-6">
                  Time to redeem:
                {{ $myCoupon->user_time_to_redeem ? date('j M, Y', strtotime($myCoupon->user_time_to_redeem)) : "till end of the campaign"}}                
                </p>
                <p class="text-xs mb-3 mt-2 md:mb-6">
                  {{ $coupon->start_date || $coupon->end_date ? "Valid between:" : ""}}
                  {{ $coupon->start_date ? date('j M, Y', strtotime($coupon->start_date)) : " "}} - {{ $coupon->end_date ? date('j M, Y', strtotime($coupon->end_date)) : "" }}                 
                </p>
                
              </a>
            
            <div class="flex space-x-1 mb-1">
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
  
              @if($myCoupon->redeemed)
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
                
              {{-- <div class="flex-1 w=4/5 m-auto text-center">
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
              </div> --}}
            </div>
            
            
      
            </div>

                {{-- <div class="aspect-w-16 aspect-h-9">
                    <img
                    class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                    src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
                    alt=""
                    />
                </div> --}}
          </div>

        
       
          
        
    
      </div>

      @endif
          @endforeach
            @endif
              @endforeach
      
              @foreach ($myCoupons as $myCoupon)
              @if (isset(Auth::user()->id) && Auth::user()->id == $myCoupon->user_id && $myCoupon->redeemed == 1)
                  @foreach ($coupons as $coupon)
                      @if ($myCoupon->coupon_id == $coupon->id)
      
      <div
          class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
        
          <a href="/coupons/{{ $coupon->slug }}" class="">
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
                  
                  @if($myCoupon->redeemed)
                  <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl opacity-50">
                    {{ $myCoupon->redeemed ? "Redeemed" : "Redeem" }}                  
                  </p>
                  @else
                  <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                    {{ $myCoupon->redeemed ? "Redeemed" : "Redeem" }}                  
                  </p>
                  @endif
                  {{-- <p class="font-bold text-base mb-1">
                      Campaign details:                   
                  </p> --}}
                  {{-- <p class="text-xs md:text-sm mb-1">
                  Category: {{ $point->category->name ?? "No Category" }}                   
                  </p> --}}
                  <p class="text-xs mb-1 mt-6">
                  Available in: {{ $coupon->venue->title ?? "No Venue" }}                   
                  </p>
                  {{-- <p class="text-xs md:text-sm mb-1">
                    Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                  </p> --}}
                  <p class="text-xs mb-3 md:mb-6">
                    Time to redeem:
                  {{ $myCoupon->user_time_to_redeem ? date('j M, Y', strtotime($myCoupon->user_time_to_redeem)) : "till end of the campaign"}}                
                  </p>
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    {{ $coupon->start_date || $coupon->end_date ? "Valid between:" : ""}}
                    {{ $coupon->start_date ? date('j M, Y', strtotime($coupon->start_date)) : " "}} - {{ $coupon->end_date ? date('j M, Y', strtotime($coupon->end_date)) : "" }}                 
                  </p>
                  
               
              
  
             
              <div class="flex space-x-1 mb-1">
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
    
                @if($myCoupon->redeemed)
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
                  
                {{-- <div class="flex-1 w=4/5 m-auto text-center">
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
                </div> --}}
              </div>
              
              
        
              </div>
  
                  {{-- <div class="aspect-w-16 aspect-h-9">
                      <img
                      class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                      src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
                      alt=""
                      />
                  </div> --}}
            </div>
  
          
         
            
          </a>
      
        </div>
  
        @endif
            @endforeach
              @endif
                @endforeach

    </div>
</div>

<div class="container my-8 mx-8">
        
  <div class="flex justify-between mb-4">
      <h2 class="font-semibold text-xl leading-tight">
          My Stamps 
          
      </h2>
  </div>
  
  
  <div
    id="scrollContainer"
    class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
  >
  @foreach ($myStamps as $myStamp)
          @if (isset(Auth::user()->id) && Auth::user()->id == $myStamp->user_id)
              @foreach ($stamps as $stamp)
                  @if ($myStamp->stamp_id == $stamp->id)
  
  <div
      class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
    
      <a href="/stamps/{{ $stamp->slug }}" class="">
        <div class="aspect-w-16 aspect-h-9">
          <img
            class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
            src="{{ asset('storage/images/loyalty/' . $stamp->image_path) }}"
            alt=""
          />
        </div>

        

        <div class="px-4 py-2 mt-2">
          <div class="text-lg leading-6 font-medium space-y-1">
            <h3 class="font-bold text-gray-800 text-lg md:text-2xl mb-2">
              {{ $stamp->title }}
            </h3>
          </div>
          <p class="text-sm md:text-lg mb-8 h-10">
            {{ $stamp->description }}                   
          </p>

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
          
          

          <div class="text-md">
              
              {{-- <p class="text-sm md:text-lg mb-8 h-10">
                  {{ $stamp->description }}                   
              </p> --}}
              
              
              {{-- <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                Points collected: {{ $myStamp->stamps_amount ?? "0" }}/{{ $stamp->total_stamps ?? "" }}                   
              </p> --}}
              {{-- <p class="font-bold text-base mb-1">
                  Campaign details:                   
              </p> --}}
              {{-- <p class="text-xs md:text-sm mb-1">
              Category: {{ $point->category->name ?? "No Category" }}                   
              </p> --}}
              <p class="text-xs mb-1 mt-6">
              Available in: {{ $stamp->venue->title ?? "No Venue" }}                   
              </p>
              {{-- <p class="text-xs md:text-sm mb-1">
                Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
              </p> --}}
              <p class="text-xs mb-3 md:mb-6">
                Time to collect all stamps:
                {{ $myStamp->user_time_to_redeem ? date('j M, Y', strtotime($myStamp->user_time_to_redeem)) : "till end of the campaign"}}                
              </p>
              <p class="text-xs mb-3 mt-2 md:mb-6">
                {{ $stamp->start_date || $stamp->end_date ? "Valid between:" : ""}}
                {{ $stamp->start_date ? date('j M, Y', strtotime($stamp->start_date)) : " "}} - {{ $stamp->end_date ? date('j M, Y', strtotime($stamp->end_date)) : "" }}                 
              </p>
              
            </a>
              

          

          
          
          <div class="flex space-x-1 mb-1">
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

                @if($myStamp->finished)
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

              {{-- <div class="aspect-w-16 aspect-h-9">
                  <img
                  class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
                  alt=""
                  />
              </div> --}}
        </div>

      
     
        
      
  
    </div>

    @endif
        @endforeach
          @endif
            @endforeach
    
  </div>
</div>


<div class="container my-8 mx-8">
        
  <div class="flex justify-between mb-4">
      <h2 class="font-semibold text-xl leading-tight">
          My Venues
          {{-- <a href="/venues/create" class="">
            <span
              class="text-salmon font-medium text-lg ml-2 hover:underline"
              >Create new venue
            </span>
          </a> --}}
      </h2>
  </div>
  
  
  <div
    id="scrollContainer"
    class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
  >
  @foreach ($myVenues as $myVenue)
  @if (isset(Auth::user()->id) && Auth::user()->id == $myVenue->user_id)
      @foreach ($venues as $venue)
          @if ($myVenue->venue_id == $venue->id)
    
  <div
      class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
    
      <a href="/venues/{{ $venue->id }}" class="w-full">
        <div class="">
          <img
            class="w-4/5 p-2 mx-auto hover:shadow-xl rounded-lg"
            src="{{ asset('storage/images/loyalty/' . $venue->logo_path) }}"
            alt=""
          />
        </div>

        

        <div class="px-4 py-2 mt-2">
          <div class="h-16 text-lg leading-6 font-medium space-y-1">
            <h3 class="font-bold text-gray-800 text-sm md:text-lg mb-2">
              {{ $venue->title }}
            </h3>
          </div>
          
          

          <div class="text-md">
              
              <p class="text-xs md:text-sm mb-5 h-14">
                  {{ $venue->description }}                   
              </p>
              
              
              <p class="text:sm md:text-lg my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-2 rounded-3xl">
                Total offers: {{ ($venue->points->count() + $venue->coupons->count() + $venue->stamps->count()) ?? "0" }}                   
              </p>

              <p class="text-xs md:text-sm mb-1">
                  Category: {{ $venue->category->name ?? "No Category" }}                   
                  </p>
              <a 
                  class=""
                  href="https://www.google.com/maps/place/{{ $venue->location }}"
                  target="_blank">                    
                  <p class="font-bold text-xs md:text-sm mb-1">
                      Address:                   
                  </p>
                  <p class="text-xs md:text-sm mb-1 h-10">
                      {{ $venue->location ?? "No location available" }}
                  </p>
                  <p class="text-xs text-indigo-700 italic hover:text-indigo-900 pb-1 mb-3">
                    Show directions ->
                  </p>
              </a>
              
              
          
              <div class="flex space-x-1 mb-1">
                <div class="flex-1 w=4/5 m-auto text-center">
                    <form 
                        action="/venues/removefrommy/{{ $venue->id }}"
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
    
                
              </div>
              
         
          
          
          </div>
 
        </div>

      </a>
  
    </div>

          
    @endif
    
    @endforeach
      @endif
        @endforeach
          
    
  </div>
</div>


    
    
   
    


</x-app-layout>