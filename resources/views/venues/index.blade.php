<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    <div class="mx-15">
        <div style="width: auto; margin: auto; height: 400px;">
            {!! Mapper::render() !!}
        </div>
    </div>
    

    <div class="container my-8 mx-8">
        
        <div class="flex justify-between mb-4">
            <h2 class="font-semibold text-xl leading-tight">
                Venues
                <a href="/venues/create" class="">
                    <span
                        class="text-salmon font-medium text-lg ml-2 hover:underline">
                        Create new venue
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
                      Total offers: {{ $venue->points->count() ?? "0" }}                   
                    </p>

                    {{-- <p class="text-xs md:text-sm mb-1">
                        Category: {{ $venue->category->name ?? "No Category" }}                   
                        </p> --}}
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
                            Go to the map ->
                        </p>
                    </a>
                    
                <div class="flex space-x-1 mb-1">
                  <div class="flex-1 w=4/5 m-auto text-center">
                      <form 
                      action="/venues/{{ $venue->slug }}"
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

   


</x-app-layout>