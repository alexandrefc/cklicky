<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    <div class="sm:flex container my-8 mx-auto w-full sm:w-4/5">
        
      <div class="flex justify-between items-center mb-4">
          <h2 class="mx-auto text-3xl">
              {{-- {{ $point->title }} --}}
              
          </h2>
      </div>
      
      
      {{-- <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      > --}}
      
      <div
          class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">
        
          {{-- <a href="" class="space-y-2 mx-auto"> --}}
            {{-- <div class="aspect-w-16 aspect-h-9">
              <img
                class="object-cover w-full mr-2 shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('/images/loyalty/' . $venue->logo_path) }}"
                alt=""
              />
            </div> --}}

            
            
            <div class="px-4 pt-2 mt-2">
              <div class="text-lg leading-6 font-medium space-y-1">
                <h3 class=" font-bold text-gray-800 text-3xl mb-2">
                  {{ $venue->title }}
                </h3>
              </div>
              
              

              <div class="text-md">
                  
                  <p class="mb-6">
                      {{ $venue->description }}                   
                  </p>
                  <p class="font-bold text-base mb-1">
                    Venue info:                   
                </p>
                <p class="text-sm mb-1">
                Category: {{ $venue->category->name ?? "No Category" }}                   
                </p>
                {{-- <p class="text-sm mb-1">
                Venue: {{ $venue->venue->title ?? "No Venue" }}                   
                </p> --}}
                <p class="text-sm mb-1">
                Address: {{ $venue->location ?? "" }}                   
                </p>
                {{-- <p class="text-sm mb-1">
                Points collected: {{ "0" }}/{{ $venue->total_points ?? "" }}                   
                </p> --}}
                <p class="text-sm mb-1">
                Active member since:
                {{ date('j M, Y', strtotime($venue->created_at)) }}                  
                </p>
                
                  
                  {{-- <p class="md:w-3/5 text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                    Total offers: {{ $venue->points->count() ?? "0" }}   
                                  
                  </p> --}}
                  {{-- <p class="font-bold text-base mb-1">
                      Campaign details:                   
                  </p>
                  <p class="text-xs md:text-sm mb-1">
                      Category: {{ $venue->category->name ?? "No Category" }}                   
                  </p> --}}
                  {{-- <p class="text-xs md:text-sm mb-1">
                      Venue: {{ $venue->venue->title ?? "No Venue" }}                   
                  </p> --}}
                  {{-- <p class="text-xs md:text-sm mb-1">
                      Reward: {{ $venue->reward_id ?? "No reward" }}                   
                  </p>
                  <p class="text-xs md:text-sm mb-1">
                      Points to collect per purchase: {{ $venue->add_x_points ?? "" }}                   
                  </p>
                  <p class="text-xs md:text-sm mb-1">
                      You can collect points every:
                      {{ $venue->reset_time ?? ""}} {{ $venue->type_of_reset_time ?? ""}}                
                  </p>
                  <p class="text-xs md:text-sm mb-3 md:mb-6">
                      Time to complete all points:
                      {{ $venue->x_time_to_redeem ?? ""}} {{ $venue->type_of_period_to_redeem ?? ""}}                
                  </p>
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                      Valid:
                      {{ date('j M, Y', strtotime($venue->start_date)) }} - {{ date('j M, Y', strtotime($venue->end_date)) }}                  
                  </p> --}}
                  <div class="flex space-x-4">
                    <div class="flex-1 w=4/5 m-auto text-center">
                      <p class=" text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                        Total offers: {{ $venue->points->count() + $venue->coupons->count() ?? "0" }}   
                                      
                      </p>
                    </div>
                      <div class="flex-3 w=4/5 m-auto text-center">
                          <form 
                              action="/venues/addtomy/{{ $venue->id }}"
                              method="POST"
                              enctype="multipart/form-data">
                              @csrf
                      
                              <button 
                                  type="submit"
                                  class=" bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                  Add to My
                              </button>
                          </form>
                      </div>
          
                      
                  </div>
                  
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
              
        
              </div>

                  {{-- <div class="aspect-w-16 aspect-h-9">
                      <img
                      class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                      src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
                      alt=""
                      />
                  </div> --}}
            </div>
            <div class="px-4 py-2 mt-2">
              {{-- <div class="text-lg leading-6 font-medium space-y-1">
                <h3 class="text-center font-bold text-gray-800 text-3xl mb-2">
                  {{ $point->title }}
                </h3>
              </div> --}}
              
              
  
              {{-- <div class="text-md"> --}}
                  
                  {{-- <p class="mb-6">
                      {{ $point->description }}                   
                  </p> --}}
                
                  {{-- <div class="flex space-x-1 mb-6">
                      <div class="flex-1 w=4/5 m-auto text-center">
                          <form 
                              action="/points/addtomy/{{ $point->id }}"
                              method="POST"
                              enctype="multipart/form-data">
                              @csrf
                      
                              <button 
                                  type="submit"
                                  class="uppercase  bg-yellow-500 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
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
                                  class="uppercase bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                  Add Points
                              </button>            
                          </form>
                      </div>
                  </div> --}}
                  {{-- <p class="font-bold text-base mb-1">
                      Conditions:                   
                  </p>
                  <p class="text-sm mb-1">
                  Category: {{ $venue->category->name ?? "No Category" }}                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Venue: {{ $venue->venue->title ?? "No Venue" }}                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Address: {{ $venue->location ?? "" }}                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Points collected: {{ "0" }}/{{ $venue->total_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="text-sm mb-1">
                  Active member since:
                  {{ date('j M, Y', strtotime($venue->created_at)) }}                  
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
              {{-- <div class="w-4/5 mt-1 mb-5 mx-auto border-b-2 border-gray-200">
                  <br>
              </div> --}}
              
        
              {{-- </div> --}}
  
                  <div class="h-14 my-auto">
                      <a href="{{ asset('storage/images/qrcodes/' . $venue->qrcode_path) }}">
                          <img
                          class="w-1/4 mx-auto my-auto shadow-md hover:shadow-xl rounded-lg"
                          src="{{ asset('storage/images/qrcodes/' . $venue->qrcode_path) }}"
                          alt=""
                          />
                      </a>
                      
                  </div>
            </div>

          
         
            
          {{-- </a> --}}
      
        </div>
        <div
        class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto border rounded-lg">
      
        {{-- <a href="" class="space-y-2 mx-auto"> --}}

          

          <a 
          class=""
          href="https://www.google.com/maps/place/{{ $venue->location }}"
          target="_blank">                    
          
      

          <div class="mx-15">
            <div style="width: auto; margin: auto; height: 500px;">
                {!! Mapper::render() !!}
            </div>
        </div>
       
      </a>
        {{-- </a> --}}
    
      </div>
          
        {{-- </div> --}}
    </div>

    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="text-3xl">
              Venue Point Campaigns
              
          </h2>
      </div>
      
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
      @foreach ($venue->points as $point)
      
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
            Venue Coupons
            
        </h2>
    </div>
    
    
    <div
      id="scrollContainer"
      class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
    >
    @foreach ($venue->coupons as $coupon)
    
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


{{-- <div class=" w-4/5 m-auto text-center py-16">
        <h1 class="text-6xl">
            {{ $venue->title }}
        </h1>
</div>

<div class="sm:grid grid-cols-1 gap-20 w-1/3 mx-auto border-t border-gray-200 text-center">
    <div>
        <img class="inline" src="{{ asset('images/loyalty/' . $venue->logo_path) }}" width="200" alt="">
    </div>
    
    <div> --}}
        {{-- <img src="{{ asset('images/qrcodes/' . $venue->qrcode_path) }}" width="70" alt=""> --}}
        {{-- <h2 class="text-gray-700 font-bold text-5xl pb-4 pt-5">
            {{ $venue->title }}
        </h2> --}}
        {{-- <span class="text-gray-500">
            Offered by <span class="font-bold italic text-gray-800">{{ $venue->venue->name }}</span>
            , Valid till {{ date('jS M Y', strtotime($venue->updated_at)) }}
        </span> --}}
        {{-- <p class="text-xl text-gray-700 leading-8 font-light">
            {{ $venue->description }}                
        </p>
    </div>
</div>
<div class="block-inline w=4/5 m-auto pt-1 text-center">
    <form 
        action="/venues/addtomy/{{ $venue->id }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Add to favourites
        </button>
    </form>

</div>
<div class="block-inline w=4/5 m-auto pt-1 text-center">
    <form 
        action="/venues/confirmaddvenues/{{ $venue->slug }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Add venues
        </button>
        

    </form>
</div> --}}
{{-- <div class="block-inline w=4/5 m-auto pt-1 text-center">
    <form 
        action="/venues/addvenues/{{ $venue->id }}/{{ auth()->user()->id }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Add venues
        </button>
        

    </form>
</div> --}}

{{-- @if (Auth::check() && Gate::allows('admin_only', auth()->user()) ) --}}
    {{-- <div class="block-inline pt-10 w-4/5 m-auto text-center">
        <img class="inline" src="{{ asset('images/qrcodes/' . $venue->qrcode_path) }}" width="300" alt="">
    </div> --}}
{{-- @endif --}}


{{-- <input 
            type="text"
            name="redeemed"
            value="{{ $venue->redeemed }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none"> --}}

            {{-- <div class="container my-8 mx-8">
                <div class="flex justify-between items-center mb-4">
                  <h2 class="text-3xl">
                    Your coupons
                    <a href="/coupons/create" class=""
                      ><span
                        class="text-salmon font-medium text-lg ml-2 hover:underline"
                        >Create new coupon
                      </span></a
                    >
                  </h2>
                  <div>
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
                  </div>
                </div>
                
                <div
                  id="scrollContainer"
                  class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
                >
                @foreach ($venue->coupons as $coupon)
                  <div
                    class="flex-none w-2/3 md:w-1/4 w-max-350px h-250 h-max-350px mr-8 md:pb-4 border rounded-lg"
                  >
                    <a href="#" class="space-y-4">
                      <div class="aspect-w-16 aspect-h-9">
                        <img
                          class="object-cover shadow-md hover:shadow-xl rounded-lg"
                          src="{{ asset('/images/loyalty/' . $coupon->image_path) }}"
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
                

            <div class="container my-8 mx-8">
                <div class="flex justify-between items-center mb-4">
                  <h2 class="text-3xl">
                    Venue Points
                    <a href="/points/create" class=""
                      ><span
                        class="text-salmon font-medium text-lg ml-2 hover:underline"
                        >Create new point
                      </span></a
                    >
                  </h2>
                  <div>
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
                  </div>
                </div>
                
                <div
                  id="scrollContainer"
                  class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
                >
                @foreach ($venue->points as $point)
                  <div
                    class="flex-none w-2/3 md:w-1/4 w-max-350px h-250 h-max-350px mr-8 md:pb-4 border rounded-lg"
                  >
                    <a href="#" class="space-y-4">
                      <div class="aspect-w-16 aspect-h-9">
                        <img
                          class="object-cover shadow-md hover:shadow-xl rounded-lg"
                          src="{{ asset('/images/loyalty/' . $point->image_path) }}"
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
            </div> --}}

</x-app-layout>