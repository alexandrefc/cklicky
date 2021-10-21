<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>
    <div class="container my-8 mx-8">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-3xl">
          Your point cards
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
      @foreach ($myPoints as $myPoint)
              @if (isset(Auth::user()->id) && Auth::user()->id == $myPoint->user_id)
                  @foreach ($points as $point)
                      @if ($myPoint->point_id == $point->id)
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
                  {{ $point->description }}                   
                </p>
                <p class="">
                  {{ $point->category->name ?? "No Category" }}                   
                </p>
                <p class="">
                  Venue: {{ $point->venue->title ?? "No Venue" }}                   
                </p>
                <p class="text-sm">
                  Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                </p>
                <p class="text-sm">
                  Points collected: {{ $myPoint->points_amount ?? "0" }}/{{ $point->total_points ?? "" }}                   
                </p>
                <p class="text-xs">
                  Valid between: <br>
                  {{ date('j M, Y', strtotime($point->start_date)) }} - {{ date('j M, Y', strtotime($point->end_date)) }}                  
                </p>
                <p class="font-medium text-sm text-indigo-600 mt-2">
                  Read more<span class="text-indigo-600">&hellip;</span>
                </p>
                <span class="text-gray-500">
                  Offered by <span class="font-bold italic text-gray-800">Venue Name</span>
                  , Valid till {{ date('jS M Y', strtotime($point->valid_till)) }}
                </span>
                <p class="text-xl text-gray-700 leading-8 font-light">
                  Your have collected  {{ $myPoint->points_amount }} points                
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
        
                    @endif
                  @endforeach
              @endif
          @endforeach
        
        
        
        
        
      </div>
  </div>
    
    
    <div class="container my-8 mx-8">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-3xl">
            Your venues
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
        @foreach ($myPoints as $myPoint)
                @if (isset(Auth::user()->id) && Auth::user()->id == $myPoint->user_id)
                    @foreach ($points as $point)
                        @if ($myPoint->point_id == $point->id)
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
          
                      @endif
                    @endforeach
                @endif
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
      @foreach ($myCoupons as $myCoupon)
                @if (isset(Auth::user()->id) && Auth::user()->id == $myCoupon->user_id)
                    @foreach ($coupons as $coupon)
                        @if ($myCoupon->coupon_id == $coupon->id)
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
        
                      @endif
                    @endforeach
                @endif
            @endforeach
        
      </div>
  </div>


</x-app-layout>