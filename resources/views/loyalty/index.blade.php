<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>

    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="text-3xl">
              Point Campaigns
              
          </h2>
      </div>
      
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
      @foreach ($points as $point)
      
      <div
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
                <h3 class="font-bold text-gray-800 text-lg md:text-3xl mb-2">
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
                  <p class="text-xs mb-1">
                    Available through: {{ $point->available_through ?? "No ava" }}                   
                    </p>
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    Valid:
                    
                    {{ date('j M, Y', strtotime($point->start_date)) }} - {{ date('j M, Y', strtotime($point->end_date)) }}                  
                  </p>
                  {{-- <p class="text-sm mb-1">
                  Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                  </p> --}}
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
                        action="/points/addtomy/{{ $point->id }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                
                        <button 
                            type="submit"
                            class=" bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Add to My
                        </button>
                    </form>
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
      </a>
        @endforeach
        
      </div>
  </div>

  <div class="container my-8 mx-8">
        
    <div class="flex justify-between mb-4">
        <h2 class="text-3xl">
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
              <h3 class="font-bold text-gray-800 text-lg md:text-3xl mb-2">
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
                  Valid:
                  
                  {{ date('j M, Y', strtotime($coupon->start_date)) }} - {{ date('j M, Y', strtotime($coupon->end_date)) }}                  
                </p>
                {{-- <p class="text-sm mb-1">
                Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                </p> --}}
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
                      action="/coupons/addtomy/{{ $coupon->id }}"
                      method="POST"
                      enctype="multipart/form-data">
                      @csrf
              
                      <button 
                          type="submit"
                          class=" bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                          Add to My
                      </button>
                  </form>
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
    </a>
      @endforeach
      
    </div>
</div>


    <div class="container my-8 mx-8">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-3xl">
          Your points
          {{-- <a href="/points/create" class=""
            ><span
              class="text-salmon font-medium text-lg ml-2 hover:underline"
              >Create new point
            </span></a
          > --}}
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

        <div
          class="flex-none w-2/3 md:w-1/4 w-max-350px h-250 h-max-350px mr-8 md:pb-4 border rounded-lg"
        >
          <a href="#" class="space-y-4">
            <div class="aspect-w-16 aspect-h-9">
              <img
                class="object-cover shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('storage/images/loyalty/' . $point->image_path) }}"
                alt=""
              />
            </div>

            

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
        </div>
      
          @endforeach
        
        
        
        
        
      </div>
  </div>
  <div class="container my-8 mx-8">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-3xl">
        Your coupons
        {{-- <a href="/coupons/create" class=""
          ><span
            class="text-salmon font-medium text-lg ml-2 hover:underline"
            >Create new coupon
          </span></a
        > --}}
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
    @foreach ($coupons as $coupon)
      <div
        class="flex-none w-2/3 md:w-1/4 w-max-350px h-250 h-max-350px mr-8 md:pb-4 border rounded-lg"
      >
        <a href="#" class="space-y-4">
          <div class="aspect-w-16 aspect-h-9">
            <img
              class="object-cover shadow-md hover:shadow-xl rounded-lg"
              src="{{ asset('storage/images/loyalty/' . $coupon->image_path) }}"
              alt=""
            />
          </div>

          

          <div class="px-4 py-2">
            <div class="text-lg leading-6 font-medium space-y-1">
              <h3 class="font-bold text-gray-800 text-3xl mb-2">
                {{ $coupon->title }}
              </h3>
            </div>
            <div class="text-lg">
              <p class="">
                {{ $coupon->description }}                   </p>
              <p class="font-medium text-sm text-indigo-600 mt-2">
                Read more<span class="text-indigo-600">&hellip;</span>
              </p>
              <span class="float-right">
                <a 
                    href="/coupons/{{ $coupon->slug }}"
                    class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                Read more
                </a>
            </span>
              
            <span class="float-right">
                <a 
                    href="/coupons/{{ $coupon->slug }}/edit"
                    class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                Edit
                </a>
            </span>

            <span class="float-right">
                <form 
                    action="/coupons/{{ $coupon->slug }}"
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
      </div>
      
                  @endforeach
      
    </div>
</div>
    
    



</x-app-layout>