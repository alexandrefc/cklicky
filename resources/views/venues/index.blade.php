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
            <h2 class="font-semibold text-xl  leading-tight">
                Recommended Venues
            </h2>
        </div>
        
        
        <div
          id="scrollContainer"
          class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
        >
          @foreach ($venues as $venue)
                
                {{-- @if ((isset(Auth::user()->id) && Auth::user()->email == $point->manager_email) || (Auth::user()->id == $point->made_by_id)) --}}
                    
        
        <div
            class="flex-none w-3/4 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
          
            <a href="/venues/{{ $venue->id }}" class="">
              <div class="">
                <img
                  class="w-full mx-auto shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('/images/loyalty/' . $venue->logo_path) }}"
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
                            Go to the map ->
                        </p>
                    </a>
                    
                    {{-- <p class="text-xs md:text-sm mb-1">
                    Venue: {{ $venue->venue->title ?? "No Venue" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-1">
                    Reward: {{ $venue->reward_id ?? "No rewards" }}                   
                      </p>
                    <p class="text-xs md:text-sm mb-1">
                      Points to collect per purchase: {{ $venue->add_x_points ?? "" }}                   
                    </p>
                    <p class="text-xs md:text-sm mb-3 md:mb-6">
                      Time to redeem:
                      
                      {{ $venue->reset_time }} {{ $venue->type_of_reset_time }}                
                    </p> --}}
                    {{-- <p class="font-bold text-xs md:text-sm mb-1">
                        Offers:                   
                    </p>
                    <p class="text-xs md:text-sm mb-3 md:mb-6 h-8">
                        
                        @foreach ($venue->points as $points)
                           
                            <a href="/points/{{ $points->slug }}">
                                <img 
                                    class="inline w-6 h-6 rounded-full border-gray-200 border my-1 transform hover:scale-125" 
                                    src="{{ asset('/images/loyalty/' . $points->image_path) }}"/>
                            </a>
                        @endforeach                
                    </p> --}}
        
                    {{-- <p class="text-xs mb-3 mt-2 md:mb-6">
                      Active since:
                      
                      {{ date('j M, Y', strtotime($venue->created_at)) }}                  
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
                            href="/venues/{{ $venue->slug }}/edit"
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

    <div class="overflow-x-auto">

        
        <div class=" bg-gray-100 flex items-center justify-center  font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <a href="/venues/create" class=""
              ><span
                class="text-salmon font-medium text-lg ml-2 hover:underline"
                >Create new venue
              </span></a
            >
                <div class="bg-white shadow-md rounded my-6">
                    <table class="table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Venue</th>
                                <th class="py-3 px-6 text-left">Description</th>
                                <th class="py-3 px-6 text-left">Location</th>
                                <th class="py-3 px-6 text-center">Offers</th>
                                <th class="py-3 px-6 text-center">Qrcode</th>
                                <th class="py-3 px-6 text-center">Details</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($venues as $venue)
                            
                            
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <div class="mr-2">
                                                <img class="w-6 h-6 rounded-full" src="{{ asset('/images/loyalty/' . $venue->logo_path) }}"/>
                                            </div>
                                        </div>
                                        <span class="font-medium">{{ $venue->title }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        {{-- <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        </div> --}}
                                        <span>{{ $venue->description }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        </div>
                                        <span>{{ $venue->location }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        @foreach ($venue->points as $points)
                                        {{-- {{ $points->title }} --}}
                                        <a href="/points/{{ $points->slug }}">
                                            <img 
                                                class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" 
                                                src="{{ asset('/images/loyalty/' . $points->image_path) }}"/>
                                        </a>

                                        @endforeach
                                        
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 border-gray-200 border transform hover:scale-125" src="{{ asset('/images/qrcodes/' . $venue->qrcode_path) }}"/>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="/venues/{{ $venue->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <a href="/venues/{{ $venue->id }}/edit">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                        </a>
                                        
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
           
                            </tr>
                      
                            @endforeach

                            {{-- <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6" src="https://img.icons8.com/color/100/000000/vue-js.png"/>
                                        </div>
                                        <span class="font-medium">Vue Project</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        </div>
                                        <span>Anita Rodriquez</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Completed</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6" src="https://img.icons8.com/color/100/000000/angularjs.png"/>
                                        </div>
                                        <span class="font-medium">Angular Project</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                        </div>
                                        <span>Taylan Bush</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Scheduled</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6" src="https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/laravel-64.png"/>
                                        </div>
                                        <span class="font-medium">Laravel Project</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/4.jpg"/>
                                        </div>
                                        <span>Tarik Novak</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pending</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6" src="https://img.icons8.com/color/48/000000/git.png" />
                                        </div>
                                        <span class="font-medium">GIT Project</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/5.jpg"/>
                                        </div>
                                        <span>Oscar Howard</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                            {{-- <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6" src="https://img.icons8.com/color/48/000000/nodejs.png" />
                                        </div>
                                        <span class="font-medium">NodeJS Project</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/6.jpg"/>
                                        </div>
                                        <span>Melisa Moon</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Scheduled</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6" src="https://img.icons8.com/color/48/000000/javascript.png"/>
                                        </div>
                                        <span class="font-medium">JavaScript Project</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/women/7.jpg"/>
                                        </div>
                                        <span>Cora Key</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Pending</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6" src="https://img.icons8.com/color/48/000000/php.png"/>
                                        </div>
                                        <span class="font-medium">PHP Project</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/8.jpg"/>
                                        </div>
                                        <span>Kylan Dorsey</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <img class="w-6 h-6 rounded-full border-gray-200 border transform hover:scale-125" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/women/2.jpg"/>
                                        <img class="w-6 h-6 rounded-full border-gray-200 border -m-1 transform hover:scale-125" src="https://randomuser.me/api/portraits/men/3.jpg"/>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Completed</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- 
    <div class="container my-8 mx-8">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-3xl">
            Your venues
          </h2>
  
        </div>
        
        <div
          id="scrollContainer"
          class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
        >
        @foreach ($venues as $venue)
  
          <div
            class="flex-none w-2/3 md:w-1/4 w-max-350px h-250 h-max-350px mr-8 md:pb-4 border rounded-lg"
          >
            <a href="#" class="space-y-4">
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('/images/loyalty/' . $venue->logo_path) }}"
                  alt=""
                />
              </div>
              <div class="aspect-w-16 aspect-h-9">
                  <img
                    class="object-cover shadow-md hover:shadow-xl rounded-lg"
                    src="{{ asset('/images/qrcodes/' . $venue->qrcode_path) }}"
                    alt=""
                  />
              </div>
  
              
  
              <div class="px-4 py-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class="font-bold text-gray-800 text-3xl mb-2">
                    {{ $venue->title }}
                  </h3>
                </div>
                <div class="text-lg">
                  <p class="">
                    {{ $venue->description }}                   </p>
                  <p class="font-medium text-sm text-indigo-600 mt-2">
                    Read more<span class="text-indigo-600">&hellip;</span>
                  </p>
                  <span class="float-right">
                    <a 
                        href="/venues/{{ $venue->slug }}"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                    Read more
                    </a>
                </span>
                  
                <span class="float-right">
                    <a 
                        href="/venues/{{ $venue->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                    Edit
                    </a>
                </span>
  
                <span class="float-right">
                    <form 
                        action="/venues/{{ $venue->slug }}"
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
    {{-- <div class="container my-8 mx-8">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-3xl">
          Your venues
          
        </h2>
        
      </div> --}}
  {{--     
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
      @foreach ($venues as $venue)
        <div
          class="flex-none w-2/3 md:w-1/4 w-max-350px h-250 h-max-350px mr-8 md:pb-4 border rounded-lg"
        >
          <a href="#" class="space-y-4">
            <div class="aspect-w-16 aspect-h-9">
              <img
                class="object-cover shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('/images/loyalty/' . $venue->logo_path) }}"
                alt=""
              />
            </div>
            <div class="aspect-w-16 aspect-h-9">
              <img
                class="object-cover shadow-md hover:shadow-xl rounded-lg"
                src="{{ asset('/images/qrcodes/' . $venue->qrcode_path) }}"
                alt=""
              />
          </div>
  
            
  
            <div class="px-4 py-2">
              <div class="text-lg leading-6 font-medium space-y-1">
                <h3 class="font-bold text-gray-800 text-3xl mb-2">
                  {{ $venue->title }}
                </h3>
              </div>
              <div class="text-lg">
                <p class="">
                  {{ $venue->description }}                   </p>
                <p class="font-medium text-sm text-indigo-600 mt-2">
                  Read more<span class="text-indigo-600">&hellip;</span>
                </p>
                <span class="float-right">
                  <a 
                      href="/venues/{{ $venue->slug }}"
                      class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                  Read more
                  </a>
              </span>
                
              <span class="float-right">
                  <a 
                      href="/venues/{{ $venue->slug }}/edit"
                      class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                  Edit
                  </a>
              </span>
  
              <span class="float-right">
                  <form 
                      action="/venues/{{ $venue->slug }}"
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
              Another category
              <a href="#" class=""
                ><span
                  class="text-salmon font-medium text-lg ml-2 hover:underline"
                  >See all
                </span></a
              >
            </h2>
            <div>
              <button
                class="cursor-venueer text-xl mx-1 text-indigo-600 font-bold"
              >
                <<
              </button>
              <button
                class="cursor-venueer text-xl mx-1 text-indigo-600 font-bold"
              >
                >>
              </button>
            </div>
          </div>
          
          <div
            id="scrollContainer"
            class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
          >
          @foreach ($venues as $venue)
            <div
              class="flex-none w-2/3 md:w-1/3 h-2/3 mr-8 md:pb-4 border rounded-lg"
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
                      {{ $venue->title }}
                    </h3>
                  </div>
                  <div class="text-lg">
                    <p class="">
                      {{ $venue->description }}                   </p>
                    <p class="font-medium text-sm text-indigo-600 mt-2">
                      Read more<span class="text-indigo-600">&hellip;</span>
                    </p>
                    
                  <span class="float-right">
                      <a 
                          href="/venue/{{ $venue->slug }}/edit"
                          class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                      Edit
                      </a>
                  </span>
  
                  <span class="float-right">
                      <form 
                          action="/venue/{{ $venue->slug }}"
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
          </div>
      </div> --}}



</x-app-layout>