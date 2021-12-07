<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>
    
    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="text-3xl">
              Your Coupon Campaigns
              <a href="/coupons/create" class=""
              ><span
                class="text-salmon font-medium text-lg ml-2 hover:underline"
                >Create new coupon
              </span></a
            >
          </h2>
      </div>
      
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
        @foreach ($coupons as $coupon)
              
              {{-- @if ((isset(Auth::user()->id) && Auth::user()->email == $point->manager_email) || (Auth::user()->id == $point->made_by_id)) --}}
                  
      
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
                <h3 class="font-bold text-gray-800 text-lg md:text-3xl mb-2">
                  {{ $coupon->title }}
                </h3>
              </div>
              
              

              <div class="text-md">
                  
                  <p class="text-sm md:text-lg mb-8 h-10">
                      {{ $coupon->description }}                   
                  </p>
                  
                  
                  {{-- <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                    Total points: {{ $coupon->total_points ?? "" }}                   
                  </p> --}}
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
                  Reward: {{ $coupon->reward_id ?? "No rewards" }}                   
                    </p>
                  {{-- <p class="text-xs md:text-sm mb-1">
                    Points to collect per purchase: {{ $coupon->add_x_points ?? "" }}                   
                  </p> --}}
                  {{-- <p class="text-xs md:text-sm mb-3 md:mb-6">
                    Time to redeem:
                    
                    {{ $coupon->reset_time }} {{ $coupon->type_of_reset_time }}                
                  </p> --}}
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    Valid:
                    
                    {{ date('j M, Y', strtotime($coupon->start_date)) }} - {{ date('j M, Y', strtotime($coupon->end_date)) }}                  
                  </p>
                  
                  
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
    
                <div class="flex-1 w=4/5 m-auto text-right">
                    {{-- <form 
                        action="/points/confirmaddpoints/{{ $point->id }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                
                        <button 
                            type="submit"
                            class=" bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                            Edit
                        </button>            
                    </form> --}}
                      <a 
                          href="/coupons/{{ $coupon->slug }}/edit"
                          class="bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                      Edit
                      </a>
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

          
         
            
          </a>
      
        </div>

              {{-- @endif --}}
            @endforeach
              
        
      </div>
  </div>

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
        @foreach ($coupons as $coupon)
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
          <div
            class="flex-none w-2/3 md:w-1/3 mr-8 md:pb-4 border rounded-lg"
          >
            <a href="#" class="space-y-4">
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover shadow-md hover:shadow-xl rounded-lg"
                  src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixqx=3H1AJd0Pae&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                  alt=""
                />
              </div>
              <div class="px-4 py-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class="font-bold text-gray-800 text-3xl mb-2">
                    Some title goes here
                  </h3>
                </div>
                <div class="text-lg">
                  <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ad recusandae, consequatur corrupti vel quisquam id itaque
                    nam
                  </p>
                  <p class="font-medium text-sm text-indigo-600 mt-2">
                    Read more<span class="text-indigo-600">&hellip;</span>
                  </p>
                </div>
              </div>
            </a>
          
          </div>
          
          <div
            class="flex-none w-2/3 md:w-1/3 mr-8 md:pb-4 border rounded-lg"
          >
            <a href="#" class="space-y-4">
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover shadow-md hover:shadow-xl rounded-lg"
                  src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixqx=3H1AJd0Pae&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                  alt=""
                />
              </div>
              <div class="px-4 py-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class="font-bold text-gray-800 text-3xl mb-2">
                    Some title goes here
                  </h3>
                </div>
                <div class="text-lg">
                  <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ad recusandae, consequatur corrupti vel quisquam id itaque
                    nam
                  </p>
                  <p class="font-medium text-sm text-indigo-600 mt-2">
                    Read more<span class="text-indigo-600">&hellip;</span>
                  </p>
                </div>
              </div>
            </a>
          </div>
          <div
            class="flex-none w-2/3 md:w-1/3 mr-8 md:pb-4 border rounded-lg"
          >
            <a href="#" class="space-y-4">
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover shadow-md hover:shadow-xl rounded-lg"
                  src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixqx=3H1AJd0Pae&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                  alt=""
                />
              </div>
              <div class="px-4 py-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class="font-bold text-gray-800 text-3xl mb-2">
                    Some title goes here
                  </h3>
                </div>
                <div class="text-lg">
                  <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ad recusandae, consequatur corrupti vel quisquam id itaque
                    nam
                  </p>
                  <p class="font-medium text-sm text-indigo-600 mt-2">
                    Read more<span class="text-indigo-600">&hellip;</span>
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div> --}}
    </div>



</x-app-layout>