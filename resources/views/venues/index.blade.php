<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    {{-- <div class="mx-15">
        <div style="width: auto; margin: auto; height: 400px;">
            {!! Mapper::render() !!}
        </div>
    </div> --}}
    {{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> --}}

{{-- <body onload="initialize()"> --}}
    <div id="map" style="width: auto; height: 480px; margin-left: auto; margin-right: auto;"></div>
     {{-- <div>
       <input id="address" type="textbox" value="{{ $location }}">
       <input type="button" value="Show on the map" onclick="codeAddress()">
     </div> --}}
   {{-- </body> --}}
    

    <div class="container my-8 mx-8">
        
        <div class="flex justify-between mb-4">
            <h2 class="font-semibold text-xl leading-tight">
                Venues
                <a href="/venues/create" class="">
                    <span
                        class="text-salmon font-medium text-lg ml-2 hover:underline">
                        + Create new venue
                    </span>
                </a>
            </h2>
        </div>
        
        
        <div
          id="scrollContainer"
          class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
        >
          @foreach ($venues as $venue)
                
                    
        
        <div
            
            class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
          
            <a href="/venues/{{ $venue->id }}" class="w-full ">
              <div id="{{ $venue->id }}" class="">
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
                    
                    
                    <p id="{{ $venue->title }}" class="text:sm md:text-lg my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-2 rounded-3xl">
                      Total offers: {{ ($venue->points->count() + $venue->coupons->count() + $venue->stamps->count()) ?? "0" }}                   
                    </p>

                    <p class="text-xs md:text-xs mb-1">
                        Category: {{ $venue->category->name ?? "No Category" }}                   
                    </p>
                    <p class="text-xs md:text-xs mb-1">
                        Email: {{ $venue->email ?? "No Email" }}                   
                    </p>
                    <p class="text-xs md:text-xs mb-1">
                        Website: {{ $venue->website ?? "No website" }}                   
                    </p>
                    <a 
                        class=""
                        href="https://www.google.com/maps/place/{{ $venue->location }}"
                        target="_blank">                    
                        <p class="font-bold text-xs md:text-sm mb-1 mt-4">
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
                  <div class="flex-1 w=4/5 m-auto">
                      {{-- <form 
                      action="/venues/{{ $venue->slug }}"
                      method="POST">
                      @csrf
                      @method('delete')
                  
                          <button 
                              type="submit"
                              class=" bg-red-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                              Delete
                          </button>
                      </form> --}}
                      @livewire('delete-venue', ['slug' => $venue->slug, 'url' => 'venues'])
                  </div>
      
                  <div class="flex-1 w=4/5 m-auto text-right">
                      
                        <a 
                            href="/venues/{{ $venue->slug }}/edit"
                            class="bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                        Edit
                        </a>
                  </div>
                  
                </div>
                
                
          
                </div>
  
                    
              </div>
  
            
           
              
            </a>
        
          </div>
  
                
              @endforeach
                
          
        </div>
    </div>

   

{{-- <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
<script type="module">
  import { MarkerClusterer } from "@googlemaps/markerclusterer";
</script> --}}


<script>


function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: { lat: 50.56391, lng: 19.154312 },
  });
  const venues =  {!! json_encode($venues->toArray()) !!};
  
  venues.forEach(element => {
   
    const offersAmount = document.getElementById(element.title).innerHTML;

    const label = element.title ;
    const contentString =
    '<div class="text-xs"id="content">' +
    '<div id="siteNotice">' +
    "</div>" +
    '<h1 id="firstHeading" class="font-extrabold pb-3">'+label+'</h1>' +
    '<div id="bodyContent">' +
    "<p><b>" +element.description+
    '</b> <p class="text:xs my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-2 rounded-3xl">' +
    offersAmount + '</p>' +
    '<p class="text-xs md:text-xs mb-1">' +
    'Category: '+element.category.name+'</p>'    +
    '<p class="text-xs md:text-xs mb-1">' +
    'Email: '+element.email+'</p>'    + 
    '<p class="text-xs md:text-xs mb-1">' +
    'Website: '+element.website+'</p>'    +               
    '<p><a href="/venues/'+element.id+'">' +
    "<b>Go to the venue -> </b></a> " +
    "</p>" +
    "</div>" +
    "</div>";
   
    const image = "http://cklicky.test/images/icons/"+element.map_icon_path+"";
    

    const message = element.description;
    const coordinates = element.coordinates;
    const marker = new google.maps.Marker({
        position: coordinates,
        map: map,
        icon: image,
        
        
        });

        marker.addListener("click", () => {
        infoWindow.setContent(contentString);
        infoWindow.open(map, marker);
        map.setZoom(6);
        map.setCenter(marker.getPosition());

      });
      
    });

          
  const infoWindow = new google.maps.InfoWindow({
    content: "cKlicky.com",
    disableAutoPan: false,
  });

  const locationButton = document.createElement("button");
  
locationButton.textContent = "Show offers nearby";
locationButton.classList.add("custom-map-control-button");
map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);


locationButton.addEventListener("click", () => {
  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };

        infoWindow.setPosition(pos);
        infoWindow.setContent("Location found.");
        infoWindow.open(map);
        map.setCenter(pos);
      },
      () => {
        handleLocationError(true, infoWindow, map.getCenter());
      }
    );
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
});
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
infoWindow.setPosition(pos);
infoWindow.setContent(
  browserHasGeolocation
    ? "Error: The Geolocation service failed."
    : "Error: Your browser doesn't support geolocation."
);

    
    // return marker;
  // });

  

  // titles.forEach(element => {
  //   geocoder.geocode( { 'address': element}, function(results, status) {
  //     if (status == 'OK') {
  //         map.setCenter(results[0].geometry.location);
  //         var marker = new google.maps.Marker({
  //             map: map,
  //             position: results[0].geometry.location
  //         });
  //     } else {
  //         alert('Geocode was not successful for the following reason: ' + status);
  //     } 
  //   );
  // });
  

  


  
  // geocoder.geocode( { 'address': address}, function(results, status) {
  //     if (status == 'OK') {
  //         map.setCenter(results[0].geometry.location);
  //         var marker = new google.maps.Marker({
  //             map: map,
  //             position: results[0].geometry.location
  //         });
  //     } else {
  //         alert('Geocode was not successful for the following reason: ' + status);
  //     }
  //     });

  // const map = new google.maps.Map(document.getElementById("map"), {
  //   zoom: 3,
  //   center: { lat: -31.56391, lng: 147.154312 },
  // });
  // locations.forEach(element => {
  //   const marker = new google.maps.Marker({
  //         position: element,
  //         map: map,
  //       });

      
  //     

  //     marker.addListener("click", () => {
  //     infoWindow.setContent(label);
  //     infoWindow.open(map, marker);
  //   });
  //   return marker;
  // });
 
  
  
  


  // // Create an array of alphabetical characters used to label the markers.
  // const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  // // Add some markers to the map.
  // const markers = locations.map((position, i) => {
  //   const label = labels[i % labels.length];
  //   const marker = new google.maps.Marker({
  //     position,
  //     label,
  //   });

  //   // markers can only be keyboard focusable when they have click listeners
  //   // open info window when marker is clicked
  //   // marker.addListener("click", () => {
  //   //   infoWindow.setContent(label);
  //   //   infoWindow.open(map, marker);
  //   // });
  //   // return marker;
  // });

  // Add a marker clusterer to manage the markers.
  // new MarkerClusterer({ markers, map });
}






  // var geocoder;
  // var map;

  // function initialize() {
  //     geocoder = new google.maps.Geocoder();
  //     var latlng = new google.maps.LatLng(-34.397, 150.644);
  //     var mapOptions = {
  //     zoom: 8,
  //     center: latlng
  //     }
  //     map = new google.maps.Map(document.getElementById('map'), mapOptions);
      
  // }

  // function codeAddress() {
  //     var address = document.getElementById('address').value;
     
  //     geocoder.geocode( { 'address': address}, function(results, status) {
  //     if (status == 'OK') {
  //         map.setCenter(results[0].geometry.location);
  //         var marker = new google.maps.Marker({
  //             map: map,
  //             position: results[0].geometry.location
  //         });
  //     } else {
  //         alert('Geocode was not successful for the following reason: ' + status);
  //     }
  //     });
  // }

  

  


</script>


<script
      src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&libraries=&v=weekly"
      async
    >

</script>



</x-app-layout>