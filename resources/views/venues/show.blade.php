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
                <p class="text-sm mb-1">
                  Email: {{ $venue->email ?? "" }}                   
                </p>
                <p class="text-sm mb-1">
                  Website: {{ $venue->website ?? "" }}                   
                </p>
                {{-- <p class="text-sm mb-1">
                Points collected: {{ "0" }}/{{ $venue->total_points ?? "" }}                   
                </p> --}}
                <p class="text-sm mb-1">
                Active member since:
                {{ date('j M, Y', strtotime($venue->created_at)) }}                  
                </p>
                
                  
                 
                  <div class="flex space-x-4">
                    <div class="flex-1 w=4/5 m-auto text-center">
                      <p class="text:xs md:text-xs my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                        Total offers: {{ $venue->points->count() + $venue->coupons->count() + $venue->coupons->count() ?? "0" }}   
                                      
                      </p>
                    </div>
                      <div class="flex-1 w=4/5 m-auto text-center">
                          {{-- <form 
                              action="/venues/addtomy/{{ $venue->id }}"
                              method="POST"
                              enctype="multipart/form-data">
                              @csrf
                      
                              <button 
                                  type="submit"
                                  class=" bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                  Add to My
                              </button>
                          </form> --}}
                          @livewire('add-remove-from-my-button', ['model' => 'venue', 'campaign' => $venue])
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
            <div class="px-4 py-2 mt-2">
              
                
  
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

          

          {{-- <a 
          class=""
          href="https://www.google.com/maps/place/{{ $venue->location }}"
          target="_blank">                     --}}
          
      

          <div class="mx-15">
            <div id="map" style="width: auto; margin: auto; height: 500px;">
                {{-- {!! Mapper::render() !!} --}}
            </div>
        </div>
       
      {{-- </a> --}}
        {{-- </a> --}}
    
      </div>
          
        {{-- </div> --}}
    </div>

    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="font-semibold text-xl leading-tigh">
              {{ $venue->title }} point campaigns
              
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
                  
                  
                  <p class="text-xs mb-1">
                    Available in: {{ $point->venue->title ?? "No Venue" }}                   
                    </p>
                    
                    <p class="text-xs mb-3 mt-2 md:mb-6">
                      {{ $point->start_date || $point->end_date ? "Valid between:" : ""}}
                      {{ $point->start_date ? date('j M, Y', strtotime($point->start_date)) : " "}} - {{ $point->end_date ? date('j M, Y', strtotime($point->end_date)) : "" }}                  
                    </p>
                  
                 
              
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

                 
            </div>

          
         
            
         
      
        </div>
      </a>
        @endforeach
        
      </div>
  </div>

  <div class="container my-8 mx-8">
        
    <div class="flex justify-between mb-4">
        <h2 class="font-semibold text-xl leading-tight">
          {{ $venue->title }} stamp campaigns
            
        </h2>
    </div>
    
    
    <div
      id="scrollContainer"
      class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
    >
    @foreach ($venue->stamps as $stamp)
    
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
            
            

            <div class="text-md">
                
                <p class="text-sm md:text-lg mb-6 h-10">
                    {{ $stamp->description }}                   
                </p>
                
                
                <p class="text-xs mb-1">
                  Available in: {{ $stamp->venue->title ?? "No Venue" }}                   
                  </p>
                 
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    {{ $stamp->start_date || $stamp->end_date ? "Valid between:" : ""}}
                    {{ $stamp->start_date ? date('j M, Y', strtotime($stamp->start_date)) : " "}} - {{ $stamp->end_date ? date('j M, Y', strtotime($stamp->end_date)) : "" }}                  
                  </p>
                

            <div class="flex space-x-1 mb-1">
              <div class="flex-1 w=4/5 m-auto text-center">
                  <form 
                      action="/stamps/addtomy/{{ $stamp->id }}"
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
                      action="/stamps/confirmaddstamps/{{ $stamp->id }}"
                      method="POST"
                      enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
              
                      <button 
                          type="submit"
                          class=" bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                          Add Stamps
                      </button>            
                  </form>
              </div>
            </div>
            
            
      
            </div>

                
          </div>

    
      </div>
    </a>
      @endforeach
      
    </div>
</div>

  <div class="container my-8 mx-8">
        
    <div class="flex justify-between mb-4">
        <h2 class="font-semibold text-xl leading-tigh">
          {{ $venue->title }} coupons
            
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
                <p class="text-xs mb-1">
                  Available in: {{ $coupon->venue->title ?? "No Venue" }}                   
                  </p>
                  
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    {{ $coupon->start_date || $coupon->end_date ? "Valid between:" : ""}}
                    {{ $coupon->start_date ? date('j M, Y', strtotime($coupon->start_date)) : " "}} - {{ $coupon->end_date ? date('j M, Y', strtotime($coupon->end_date)) : "" }}                  
                  </p>
             

         
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

              
          </div>

    
      </div>
    </a>
      @endforeach
      
    </div>
</div>

<script>


  function initMap() {
    const venue =  {!! json_encode($venue) !!};
    const label = venue.title ;
    const coordinates = venue.coordinates;
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 12,
      center: coordinates,
    });
    const infoWindow = new google.maps.InfoWindow({
      content: "cKlicky.com",
      disableAutoPan: false,
    });
    
      const contentString =
      '<div class="text-xs"id="content">' +
      '<div id="siteNotice">' +
      "</div>" +
      '<h1 id="firstHeading" class="font-extrabold pb-3">'+label+'</h1>' +
      '<div id="bodyContent">' +
      // "<p><b>" +venue.description+
      '</b> <p class="text:xs my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-2 rounded-3xl">' +
      "Total offers: " + '{{ $venue->points->count() ?? "0" }}</p>' +
      '<p class="text-xs md:text-xs mb-1">' +
      'Email: '+venue.email+'</p>'    + 
      '<p class="text-xs md:text-xs mb-1">' +
      'Website: '+venue.website+'</p>'    +               
      '<p><a href="https://www.google.com/maps/place/'+venue.location+'">' + 
      "<b>Show directions -> </b></a> " +
      "</p>" +
      "</div>" +
      "</div>";
     
      // const image = "http://cklicky.test/images/loyalty/"+element.logo_path+"";
  
      const message = venue.description;
      
      const marker = new google.maps.Marker({
          position: coordinates,
          map: map,
         
          // icon: image,
          });
  
          marker.addListener("click", () => {
          infoWindow.setContent(contentString);
          infoWindow.open(map, marker);
          map.setZoom(12);
          map.setCenter(marker.getPosition());
  
        });
        
  }
  
  </script>
  
  
  <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&libraries=&v=weekly"
        async
      >
  
  </script>

</x-app-layout>