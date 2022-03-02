<x-app-layout>

  
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

        <div x-data="{ open: false }" class="bg-gradient-to-b from-green-700 to-green-300 w-4/5 sm:w-5/12 md:w-1/3 lg:w-1/5">
          <button class="text-white font-bold w-full" @click="open = ! open">Choose brands and categories =></button>
          
            <div style="display: none !important;" x-show="open" @click.outside="open = false">
              <button class="text-white font-bold w-full">Show categories</button>
              <div class="inline-flex w-1/2 sm:w-3/4 ml-2 text-gray-100 text-xs font-extrabold">
                <label >All Categories</label>
              </div>
              <div class="inline-flex w-1/5">
                <input class=" rounded-md" name="categoryAll" type="checkbox" value="all" id="categoryAll">
              </div>
              @foreach ($categories as $category)
                <div class="inline-flex w-1/2 sm:w-3/4 ml-2 text-gray-100 text-xs font-extrabold">
                  <label >{{ $category->name }}</label>
                </div>
                <div class="inline-flex w-1/5">
                  <input class=" rounded-md" name="category" type="checkbox" value="{{ $category->id }}" id="category"
                    @if (in_array($category->id, explode(',', request()->input('filter.category'))))
                        checked
                    @endif
                  >
                </div>
              @endforeach
              <button class="text-white font-bold w-full">Show venues</button>
              <div class="inline-flex w-1/2 sm:w-3/4 ml-2 text-gray-100 text-xs font-extrabold">
                <label >All Venues</label>
              </div>
              <div class="inline-flex w-1/5">
                <input class=" rounded-md" name="venueAll" type="checkbox" value="all" id="venueAll">
              </div>
              @foreach ($venues as $venue)
                <div class="inline-flex w-1/2 sm:w-3/4 ml-2 text-gray-100 text-xs font-extrabold">
                  <label >{{ $venue->title }}</label>
                </div>
                <div class="inline-flex w-1/5">
                  <input class=" rounded-md" name="venue" type="checkbox" value="{{ $venue->id }}" id="venue"
                    @if (in_array($venue->id, explode(',', request()->input('filter.venue'))))
                        checked
                    @endif
                  >
                </div>
              @endforeach
              <div class="items-center w-1/4 mx-auto">
                <button class="bg-blue-100 rounded-sm mx-auto w-full my-2 text-xs sm:text-sm" type="button" id="filter">Filter</button>
              </div>
              
            </div>
        </div>  
  
    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="font-semibold text-xl leading-tight">
              Point Campaigns
              
          </h2>
      </div>
      
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8 mr-4"
      >
      @foreach ($points as $point)
      
      <div
          x-data="{ open: false }"
          x-show="{ open: false }"
          id="{{ $point->category_id }}"
          class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
          <a href="/points/{{ $point->slug }}" class="">

          {{-- <a href="" class="space-y-2"> --}}
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
                  
                  <p class="text-sm md:text-lg mb-6 h-10">
                      {{ $point->description }}
                                         
                  </p>
                  
                  
                  {{-- <p class="text-xl mb-1 text-center">
                    Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="font-bold text-base mb-1">
                      More details:                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Category: {{ $point->category->name ?? "No Category" }}                   
                  </p> --}}
                  <p class="text-xs mb-1">
                  Available in: {{ $point->venue->title ?? "No Venue" }}                   
                  </p>
                  {{-- <p class="text-xs mb-1">
                    Available through: {{ $point->available_through ?? "No ava" }}                   
                    </p> --}}
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    {{ $point->start_date || $point->end_date ? "Valid between:" : ""}}
                    {{ $point->start_date ? date('j M, Y', strtotime($point->start_date)) : " "}} - {{ $point->end_date ? date('j M, Y', strtotime($point->end_date)) : "" }}                  
                  </p>
                  {{-- <p class="text-sm mb-1">
                  Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p> --}}
                  
                </a>
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
                    {{-- <form 
                        action="/points/addtomy/{{ $point->id }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                
                        <button 
                            type="submit"
                            class=" bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Add to My
                        </button>
                    </form> --}}
                    @livewire('add-remove-from-my-button', ['model' => 'point', 'campaign' => $point])
                </div>
    
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

          
         
            
          {{-- </a> --}}
      
        </div>
     
        @endforeach
       
      </div>
  </div>

  <div class="container my-8 mx-8">
        
    <div class="flex justify-between mb-4">
        <h2 class="font-semibold text-xl leading-tight">
            Coupon Campaigns
            
        </h2>
    </div>
    
    
    <div
      id="scrollContainer"
      class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
    >
    @foreach ($coupons as $coupon)
    
    <div
        class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
        <a href="/coupons/{{ $coupon->slug }}" class="">
        {{-- <a href="" class="space-y-2"> --}}
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
                
                <p class="text-sm md:text-lg mb-6 h-10">
                    {{ $coupon->description }}                   
                </p>
                
                
                {{-- <p class="text-xl mb-1 text-center">
                  Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                </p> --}}
                {{-- <p class="font-bold text-base mb-1">
                    More details:                   
                </p> --}}
                {{-- <p class="text-sm mb-1">
                Category: {{ $point->category->name ?? "No Category" }}                   
                </p> --}}
                <p class="text-xs mb-1">
                Available in: {{ $coupon->venue->title ?? "No Venue" }}                   
                </p>
                <p class="text-xs mb-3 mt-2 md:mb-6">
                  {{ $coupon->start_date || $coupon->end_date ? "Valid between:" : ""}}
                  {{ $coupon->start_date ? date('j M, Y', strtotime($coupon->start_date)) : " "}} - {{ $coupon->end_date ? date('j M, Y', strtotime($coupon->end_date)) : "" }}
                </p>
                {{-- <p class="text-sm mb-1">
                Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                </p> --}}
                {{-- <p class="text-sm mb-1">
                Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                </p> --}}
                
              </a>
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
                  {{-- <form 
                      action="/coupons/addtomy/{{ $coupon->id }}"
                      method="POST"
                      enctype="multipart/form-data">
                      @csrf
              
                      <button 
                          type="submit"
                          class=" bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                          Add to My
                      </button>
                  </form> --}}
                  @livewire('add-remove-from-my-button', ['model' => 'coupon', 'campaign' => $coupon])
              </div>
  
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

        
       
          
        {{-- </a> --}}
    
      </div>
   
      @endforeach
      
    </div>
</div>

<div class="container my-8 mx-8">
        
  <div class="flex justify-between mb-4">
      <h2 class="font-semibold text-xl leading-tight">
          Stamp Campaigns
          
      </h2>
  </div>
  
  
  <div
    id="scrollContainer"
    class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
  >
  @foreach ($stamps as $stamp)
  
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

          {{-- @for ($i = 0; $i < $myStamp->stamps_amount; $i++)
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
          @endfor --}}
          
          

          <div class="text-md">
              
              <p class="text-sm md:text-lg mb-8 h-10">
                  {{ $stamp->description }}                   
              </p>
              
              
              {{-- <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                Points collected: {{ $myStamp->stamps_amount ?? "0" }}/{{ $stamp->total_stamps ?? "" }}                   
              </p> --}}
              {{-- <p class="font-bold text-base mb-1">
                  Campaign details:                   
              </p> --}}
              {{-- <p class="text-xs md:text-sm mb-1">
              Category: {{ $point->category->name ?? "No Category" }}                   
              </p> --}}
              <p class="text-xs mb-1">
              Available in: {{ $stamp->venue->title ?? "No Venue" }}                   
              </p>
              {{-- <p class="text-xs md:text-sm mb-1">
                Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
              </p> --}}
              {{-- <p class="text-xs md:text-sm mb-3 md:mb-6">
                Your time to redeem:
                
                {{ date('j M, Y', strtotime($myStamp->user_time_to_redeem)) }}                
              </p> --}}
              
              <p class="text-xs mb-3 mt-2 md:mb-6">
                  {{ $stamp->start_date || $stamp->end_date ? "Valid between:" : ""}}
                  {{ $stamp->start_date ? date('j M, Y', strtotime($stamp->start_date)) : " "}} - {{ $stamp->end_date ? date('j M, Y', strtotime($stamp->end_date)) : "" }}
              </p>
              
              
              
              {{-- <p class="text-sm mb-1">
              Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
              </p> --}}
              
            </a>
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
                {{-- <form 
                    action="/stamps/addtomy/{{ $stamp->id }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
            
                    <button 
                        type="submit"
                        class=" bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                        Add to My
                    </button>
                </form> --}}
                @livewire('add-remove-from-my-button', ['model' => 'stamp', 'campaign' => $stamp])
            </div>

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
                        Stamp Me
                    </button>            
                </form>
            </div>
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

    
            @endforeach
    
  </div>
</div>


<div class="container my-8 mx-8">
        
  <div class="flex justify-between mb-4">
      <h2 class="font-semibold text-xl leading-tight">
          Small Image Coupon Campaigns
          
      </h2>
  </div>
  
  
  <div
    id="scrollContainer"
    class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
  >
  @foreach ($coupons as $coupon)
  
  

  <div
      style="background-image: url({{ asset('/storage/images/loyalty/' . $coupon->image_path) }})"
      class="relative full-screen-image h-52 flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
      <a href="/coupons/{{ $coupon->slug }}" class="">
      {{-- <a href="" class="space-y-2"> --}}
        {{-- <div class="aspect-w-16 aspect-h-9">
          <img
            class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
            src="{{ asset('storage/images/loyalty/' . $coupon->image_path) }}"
            alt=""
          />
        </div> --}}

        

        <div 
          class="px-4 py-2 mt-2 ">
          <div class="text-lg leading-6 font-medium space-y-1">
            <h3 class="font-bold text-gray-100 text-lg md:text-2xl mb-2">
              {{ $coupon->title }}
            </h3>
          </div>
          
          

          <div class="text-md text-gray-900">
              
              {{-- <p class="text-sm md:text-lg mb-6 h-10">
                  {{ $coupon->description }}                   
              </p> --}}
              
              
              {{-- <p class="text-xl mb-1 text-center">
                Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
              </p> --}}
              {{-- <p class="font-bold text-base mb-1">
                  More details:                   
              </p> --}}
              {{-- <p class="text-sm mb-1">
              Category: {{ $point->category->name ?? "No Category" }}                   
              </p> --}}
              {{-- <p class="text-xs mb-1">
              Available in: {{ $coupon->venue->title ?? "No Venue" }}                   
              </p> --}}
              {{-- <p class="text-xs mb-3 mt-2 md:mb-6">
                Valid:
                
                {{ date('j M, Y', strtotime($coupon->start_date)) }} - {{ date('j M, Y', strtotime($coupon->end_date)) }}                  
              </p> --}}
            </a>
          <div class="flex w-11/12 space-x-1 mb-1 absolute inset-x-0 bottom-4 mx-auto">
            <div class="text-center m-auto w-1/2">
                {{-- <form 
                    action="/coupons/addtomy/{{ $coupon->id }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
            
                    <button 
                        type="submit"
                        class="bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                        Add to My
                    </button>
                </form> --}}
                @livewire('add-remove-from-my-button', ['model' => 'coupon', 'campaign' => $coupon])
            </div>

            <div class="text-center m-auto w-1/2">
                <form 
                    action="/coupons/confirmredeem/{{ $coupon->id }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            
                    <button 
                        type="submit"
                        class="bg-pink-700 bg-opacity-50 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                        Redeem
                    </button>            
                </form>
            </div>
          </div>
          
          
    
          </div>

              
        </div>

      
     
        
      {{-- </a> --}}
  
    </div>
  
    @endforeach
    
  </div>
</div>




    <div class="container my-8 mx-8">
      <div class="flex justify-between items-center mb-4">
        <h2 class="font-semibold text-xl leading-tight">
          Full Screen Image Point Campaigns
          
        </h2>
        {{-- <div>
          <button
            class="cursor-pointer text-xl mx-1 text-indigo-600 font-bold"
          >
            <<
          </button>
          <button
            class="cursor-pointer text-xl mx-1 text-indigo-600 font-bold"
          >
            >>
          </button>
        </div> --}}
      </div>
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
      @foreach ($points as $point)

      @if ($point->image_fs_path != null)
  
      <div
        style="background-image: url({{ asset('/storage/images/loyalty/' . $point->image_fs_path) }})"
        class="relative h-96 full-screen-image flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
        <a href="/points/{{ $point->slug }}" class="">
     
        {{-- <div class="aspect-w-16 aspect-h-9">
          <img
            class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
            src="{{ asset('storage/images/loyalty/' . $coupon->image_path) }}"
            alt=""
          />
        </div> --}}

        

        <div 
          class="px-4 py-2 mt-2 ">
          <div class="text-lg leading-6 font-medium space-y-1">
            <h3 class="font-bold text-gray-100 text-lg md:text-2xl mb-2">
              {{ $point->title }}
            </h3>
          </div>
          
          

          <div class="text-md text-gray-900">
              
          
    
          </div>

        </div>

      
     
        
      </a>
      <div class="flex w-11/12 space-x-1 mb-1 absolute inset-x-0 bottom-4 mx-auto">
        <div class="text-center m-auto w-1/2">
          {{-- <form 
              action="/points/addtomy/{{ $point->id }}"
              method="POST"
              enctype="multipart/form-data">
              @csrf
      
              <button 
                  type="submit"
                  class=" bg-yellow-500 bg-opacity-50 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                  Add to My
              </button>
          </form> --}}
          @livewire('add-remove-from-my-button', ['model' => 'point', 'campaign' => $point])
        </div>

        <div class="text-center m-auto w-1/2">
            <form 
                action="/points/confirmaddpoints/{{ $point->id }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <button 
                    type="submit"
                    class=" bg-pink-700 bg-opacity-50 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                    Add Points
                </button>            
            </form>
        </div>
      </div>
    </div>

    

 




      @else


        {{-- <div
          class="flex-none w-2/3 md:w-1/4 w-max-350px h-250 h-max-350px mr-8 md:pb-4 border rounded-lg h-96"
        >
          <a href="#" class="space-y-4">
            <div class="aspect-w-16 aspect-h-9">
              @if ($point->video_yt_id != null)
                <iframe 
                  class="w-full rounded-lg"
                  height="211" 
                  src="https://www.youtube.com/embed/{{ $point->video_yt_id }}" 
                  title="YouTube video player" frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen>
                </iframe> 
              @else
                <img
                class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('storage/images/loyalty/' . $point->image_path) }}"
                alt=""
                />
              @endif --}}
                           
              {{-- <img
                class="object-cover shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('storage/images/loyalty/' . $point->image_path) }}"
                alt=""
              /> --}}
              {{-- <video 
              src="https://www.youtube.com/watch?v=tlUcmD0zPI"
              width="320" height="240" controls autoplay muted>
                
                <source src="https://www.youtube.com/watch?v=tlUcmD0zPI">
              Your browser does not support the video tag.
            </video> --}}
            {{-- <div id="panel-9-11-0-0" class="so-panel widget widget_sow-editor panel-first-child" data-index="27" >              
              <iframe width="300" height="220" src="https://www.youtube.com/embed/E7SCzULQYUQ?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              <h3>title</h3>
          </div> --}}
            {{-- </div>

            

            <div class="px-4 py-2">
              <div class="text-lg leading-6 font-medium space-y-1">
                <h3 class="font-bold text-gray-800 text-3xl mb-2">
                  {{ $point->title }}
                </h3>
              </div>

              <div class="text-lg">
                <p class="">
                  {{ $point->description }}                   </p>
                <p class="font-medium text-sm text-indigo-600 mt-2">
                  Read more<span class="text-indigo-600">&hellip;</span>
                </p>
                <span class="float-right">
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
              </span>

              <span class="float-right">
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
              </span>
              
        
              </div>
            </div>
          </a>
          
        </div> --}}
        @endif
          @endforeach
        
        
      </div>
  </div>

  <div class="container my-8 mx-8">
        
    <div class="flex justify-between mb-4">
        <h2 class="font-semibold text-xl leading-tight">
            Venues
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
    
        @foreach ($venues as $venue)
           
            
                
    
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
                      {{-- <form 
                          action="/venues/addtomy/{{ $venue->id }}"
                          method="POST"
                          enctype="multipart/form-data">
                          @csrf
                          
                  
                          <button 
                              type="submit"
                              class=" bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                              Add to My
                          </button>
                      </form> --}}
                      @livewire('add-remove-from-my-button', ['model' => 'venue', 'campaign' => $venue])
                  </div>
      
                  
                </div>
                
           
            
            
            </div>
   
          </div>
  
        </a>
    
      </div>
  
            
      
          @endforeach
            
      
    </div>
  </div>
 
  <script>

    // by categories & venues

    function getIds(checkboxName) {
        let checkBoxes = document.getElementsByName(checkboxName);
        let ids = Array.prototype.slice.call(checkBoxes)
                        .filter(ch => ch.checked==true)
                        .map(ch => ch.value);
        return ids;
    }

    function filterResults () {

        let categoryIds = getIds("category");
        let venueIds = getIds("venue");

        let href = 'loyalty?';

        if(categoryIds.length) {
            href += '&filter[category]=' + categoryIds;
        }

        if(venueIds.length) {
            href += '&filter[venue]=' + venueIds;
        }

        document.location.href=href;
    }

    document.getElementById("filter").addEventListener("click", filterResults);
    // document.getElementById("filterVenue").addEventListener("click", filterResults);
    


    //Check All Categories

    function checkCategories(checked = true) {
    const cbs = document.querySelectorAll('input[name="category"]');
    cbs.forEach((cb) => {
        cb.checked = checked;
    });
    }

    const btnc = document.querySelector('#categoryAll');
    btnc.onclick = checkAllCategories; 

    function checkAllCategories() {
        checkCategories();
        // reassign click event handler
        this.onclick = uncheckAllCategories;
    }

    function uncheckAllCategories() {
        checkCategories(false);
        // reassign click event handler
        this.onclick = checkAllCategories;
    }

    //Check All Venues

    function checkVenues(checked = true) {
    const cbsv = document.querySelectorAll('input[name="venue"]');
    cbsv.forEach((cb) => {
        cb.checked = checked;
    });
    }

    const btnv = document.querySelector('#venueAll');
    btnv.onclick = checkAllVenues; 

    function checkAllVenues() {
        checkVenues();
        // reassign click event handler
        this.onclick = uncheckAllVenues;
    }

    function uncheckAllVenues() {
        checkVenues(false);
        // reassign click event handler
        this.onclick = checkAllVenues;
    }

</script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/airbnb.min.css">
       --}}
  
</x-app-layout>