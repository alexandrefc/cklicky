<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>
    
    
    <div class="container my-8 mx-8">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-3xl">
            Your points
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
        @foreach ($points as $point)
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
                    Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                  </p>
                  <p class="text-xs">
                    Valid between: <br>
                    {{ date('j M, Y', strtotime($point->start_date)) }} - {{ date('j M, Y', strtotime($point->end_date)) }}                  
                  </p>
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
    </div>



</x-app-layout>