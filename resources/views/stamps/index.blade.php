<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>
    
    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="font-semibold text-xl leading-tight">
              Your Stamp Campaigns
              <a href="/stamps/create" class=""
              ><span
                class="text-salmon font-medium text-lg ml-2 hover:underline"
                >+ Create new stamp
              </span></a
            >
              
          </h2>
      </div>
      
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
        @foreach ($stamps as $stamp)
              
              {{-- @if ((isset(Auth::user()->id) && Auth::user()->email == $stamp->manager_email) || (Auth::user()->id == $stamp->made_by_id)) --}}
                  
      
      <div
          class="flex-none w-3/4 sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
        
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
                  
                  <p class="text-sm md:text-lg mb-8 h-10">
                      {{ $stamp->description }}                   
                  </p>
                  
                  
                  <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                    Total stamps: {{ $stamp->total_stamps ?? "" }}                   
                  </p>
                  <p class="font-bold text-base mb-1">
                      Campaign details:                   
                  </p>
                  <p class="text-xs md:text-sm mb-1">
                  Category: {{ $stamp->category->name ?? "No Category" }}                   
                  </p>
                  <p class="text-xs md:text-sm mb-1">
                  Venue: {{ $stamp->venue->title ?? "No Venue" }}                   
                  </p>
                  <p class="text-xs md:text-sm mb-1">
                  Reward: {{ $stamp->reward_id ?? "No rewards" }}                   
                    </p>
                  <p class="text-xs md:text-sm mb-1">
                    stamps to collect per purchase: {{ $stamp->add_x_stamps ?? "" }}                   
                  </p>
                  <p class="text-xs md:text-sm mb-3 md:mb-6">
                    Time to redeem:
                    
                    {{ $stamp->reset_time }} {{ $stamp->type_of_reset_time }}                
                  </p>
                  <p class="text-xs mb-3 mt-2 md:mb-6">
                    Valid:
                    
                    {{ date('j M, Y', strtotime($stamp->start_date)) }} - {{ date('j M, Y', strtotime($stamp->end_date)) }}                  
                  </p>
                  
                  
                  {{-- <p class="text-sm mb-1">
                  stamps collected: {{ "0" }}/{{ $stamp->total_stamps ?? "" }}                   
                  </p> --}}
                  
                  
                  {{-- <span class="">
                  <a 
                      href="/stamps/{{ $stamp->slug }}"
                      class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                  Read more
                  </a>
                  </span>
                  
                  <span class="float-right">
                      <a 
                          href="/stamps/{{ $stamp->slug }}/edit"
                          class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                      Edit
                      </a>
                  </span> --}}
                  

              

              {{-- @if($stamp->id == $mystamps->stamp_id)
                <span class="float-right">
                  <form 
                      action="/stamps/addtomy/{{ $stamp->id }}"
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
                    action="/stamps/addtomy/{{ $stamp->id }}"
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
                      action="/stamps/{{ $stamp->slug }}"
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
                    action="/stamps/{{ $stamp->slug }}"
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
                        action="/stamps/confirmaddstamps/{{ $stamp->id }}"
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
                          href="/stamps/{{ $stamp->slug }}/edit"
                          class="bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                      Edit
                      </a>
                </div>
              </div>
              
              
        
              </div>

                  {{-- <div class="aspect-w-16 aspect-h-9">
                      <img
                      class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                      src="{{ asset('images/qrcodes/' . $stamp->qrcode_path) }}"
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



</x-app-layout>