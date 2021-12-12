<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    <div class="sm:flex container my-8 mx-auto w-full sm:w-3/5">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="mx-auto text-3xl">
                {{-- {{ $stamp->title }} --}}
                
            </h2>
        </div>
        
        
        {{-- <div
          id="scrollContainer"
          class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
        > --}}
        
        <div
            class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">
          
            {{-- <a href="" class="space-y-2 mx-auto"> --}}
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('storage/images/loyalty/' . $stamp->image_path) }}"
                  alt=""
                />
              </div>

              

              <div class="px-4 py-2 mt-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class=" font-bold text-gray-800 text-3xl mb-2">
                    {{ $stamp->title }}
                  </h3>
                </div>
                
                

                <div class="text-md">
                    
                    <p class="mb-6">
                        {{ $stamp->description }}                   
                    </p>
                    <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                        stamps collected: {{ $mystamp->stamps_amount ?? "0" }}/{{ $stamp->total_stamps ?? "" }}                   
                    </p>
                    
                    <p class="font-bold text-base mb-1">
                    Campaign details:                   
                    </p>
                    <p class="text-sm mb-1">
                    Category: {{ $stamp->category->name ?? "No Category" }}                   
                    </p>
                    <p class="text-sm mb-1">
                    Venue: {{ $stamp->venue->title ?? "No Venue" }}                   
                    </p>
                    <p class="text-sm mb-1">
                    stamps to collect per purchase: {{ $stamp->add_x_stamps ?? "" }}                   
                    </p>
                    <p class="text-sm mb-1">
                    stamps collected: {{ "0" }}/{{ $stamp->total_stamps ?? "" }}                   
                    </p>
                    <p class="text-sm mb-6">
                    Valid between:
                    {{ date('j M, Y', strtotime($stamp->start_date)) }} - {{ date('j M, Y', strtotime($stamp->end_date)) }}                  
                    </p>
                    {{-- <div class="flex space-x-1 mb-2">
                        <div class="flex-1 w=4/5 m-auto text-center">
                            <form 
                                action="/stamps/addtomy/{{ $stamp->id }}"
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
                                action="/stamps/confirmaddstamps/{{ $stamp->id }}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        
                                <button 
                                    type="submit"
                                    class="uppercase bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                    Add stamps
                                </button>            
                            </form>
                        </div>
                    </div> --}}
                    
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
                
          
                </div>

                    {{-- <div class="aspect-w-16 aspect-h-9">
                        <img
                        class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('images/qrcodes/' . $stamp->qrcode_path) }}"
                        alt=""
                        />
                    </div> --}}
              </div>

            
           
              
            {{-- </a> --}}
        
          </div>

          
        <div
        class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">
      
        {{-- <a href="" class="space-y-2 mx-auto"> --}}

          

          <div class="px-4 py-2 mt-2">
            {{-- <div class="text-lg leading-6 font-medium space-y-1">
              <h3 class="text-center font-bold text-gray-800 text-3xl mb-2">
                {{ $stamp->title }}
              </h3>
            </div> --}}
            
            

            <div class="text-md">
                
                {{-- <p class="mb-6">
                    {{ $stamp->description }}                   
                </p> --}}
              
                {{-- <div class="flex space-x-1 mb-6">
                    <div class="flex-1 w=4/5 m-auto text-center">
                        <form 
                            action="/stamps/addtomy/{{ $stamp->id }}"
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
                            action="/stamps/confirmaddstamps/{{ $stamp->id }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    
                            <button 
                                type="submit"
                                class="uppercase bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                Add stamps
                            </button>            
                        </form>
                    </div>
                </div> --}}
                <p class="font-bold text-base mb-1">
                    More details:                   
                </p>
                <p class="text-sm mb-1">
                Category: {{ $stamp->category->name ?? "No Category" }}                   
                </p>
                <p class="text-sm mb-1">
                Venue: {{ $stamp->venue->title ?? "No Venue" }}                   
                </p>
                <p class="text-sm mb-1">
                stamps to collect per purchase: {{ $stamp->add_x_stamps ?? "" }}                   
                </p>
                <p class="text-sm mb-1">
                stamps collected: {{ "0" }}/{{ $stamp->total_stamps ?? "" }}                   
                </p>
                <p class="text-sm mb-6">
                Valid between:
                {{ date('j M, Y', strtotime($stamp->start_date)) }} - {{ date('j M, Y', strtotime($stamp->end_date)) }}                  
                </p>
                <div class="flex-1 w=4/5 m-auto text-center">
                    <form 
                        action="/stamps/addstamps/{{ $stamp->id }}/{{ auth()->user()->id }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                
                        <button 
                            type="submit"
                            class="uppercase bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                            Add stamps
                        </button>            
                    </form>
                </div>
                
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
            <div class="w-4/5 mt-10 mb-10 mx-auto border-b-2 border-gray-200">
                <br>
            </div>
            
      
            </div>

                <div class="aspect-w-16 aspect-h-9 my-5">
                    <a href="{{ asset('storage/images/qrcodes/' . $addStampsQrcodePath) }}">
                        <img
                        class="w-3/4 mx-auto mt-5 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('storage/images/qrcodes/' . $addStampsQrcodePath) }}"
                        alt=""
                        />
                    </a>
                    
                </div>
          </div>

        
       
          
        {{-- </a> --}}
    
      </div>
          
        {{-- </div> --}}
    </div>


    <div class="container my-8 mx-auto w-full">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="mx-auto text-3xl">
                {{-- {{ $stamp->title }} --}}
                
            </h2>
        </div>
        
        
        {{-- <div
          id="scrollContainer"
          class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
        > --}}
        
          <div
            class="flex-none w-full md:w-1/4 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">
          
            {{-- <a href="" class="space-y-2 mx-auto"> --}}
              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('storage/images/loyalty/' . $stamp->image_path) }}"
                  alt=""
                />
              </div>

              

              <div class="px-4 py-2 mt-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class="text-center font-bold text-gray-800 text-3xl mb-2">
                    {{ $stamp->title }}
                  </h3>
                </div>
                
                

                <div class="text-md">
                    
                    <p class="mb-6">
                        {{ $stamp->description }}                   
                    </p>
                  
                    <div class="flex space-x-1 mb-6">
                        {{-- <div class="flex-1 w=4/5 m-auto text-center">
                            <form 
                                action="/stamps/addtomy/{{ $stamp->id }}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                        
                                <button 
                                    type="submit"
                                    class="uppercase  bg-yellow-500 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                    Add to My
                                </button>
                            </form>
                        </div> --}}
            
                        <div class="flex-1 w=4/5 m-auto text-center">
                            <form 
                                action="/stamps/addstamps/{{ $stamp->id }}/{{ auth()->user()->id }}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        
                                <button 
                                    type="submit"
                                    class="uppercase bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                    Add stamps
                                </button>            
                            </form>
                        </div>
                    </div>
                    <p class="font-bold text-base mb-1">
                        More details:                   
                    </p>
                    <p class="text-sm mb-1">
                    Category: {{ $stamp->category->name ?? "No Category" }}                   
                    </p>
                    <p class="text-sm mb-1">
                    Venue: {{ $stamp->venue->title ?? "No Venue" }}                   
                    </p>
                    <p class="text-sm mb-1">
                    stamps to collect per purchase: {{ $stamp->add_x_stamps ?? "" }}                   
                    </p>
                    <p class="text-sm mb-1">
                    stamps collected: {{ "0" }}/{{ $stamp->total_stamps ?? "" }}                   
                    </p>
                    <p class="text-sm mb-6">
                    Valid between:
                    {{ date('j M, Y', strtotime($stamp->start_date)) }} - {{ date('j M, Y', strtotime($stamp->end_date)) }}                  
                    </p>
                    
                    <span class="">
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
                    </span>
                    

                

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
                

                <span class="float-right">
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
                </span>
                <div class="w-4/5 mb-5 mx-auto border-b-2 border-gray-200">
                    <br>
                </div>
                
          
                </div>

                    <div class="aspect-w-16 aspect-h-9">
                        <img
                        class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('storage/images/qrcodes/' . $addStampsQrcodePath) }}"
                        alt=""
                        />
                    </div>
              </div>

            
           
              
            {{-- </a> --}}
        
          </div>

          
          
        {{-- </div> --}}
    </div>

    


</x-app-layout>