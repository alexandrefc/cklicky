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
                  
                <p class="text-sm md:text-lg mb-6 h-10">
                    {{ $stamp->description }}                   
                </p>
                
                {{-- <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                  Total stamps: {{ $stamp->add_x_stamps . "/" . $stamp->total_stamps ?? "" }}                   
                </p> --}}
                @for ($i = 0; $i < $stamp->add_x_stamps; $i++)
                      <div class="inline-flex border-2 border-pink-500 rounded-full h-10 w-10 items-center justify-center text-pink-500 m-1">
                        <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                        </svg>
                      </div>
                @endfor

                @for ($i = 0; $i < ($stamp->total_stamps - $stamp->add_x_stamps); $i++)
                      <div class="inline-flex border-2 border-gray-300 rounded-full h-10 w-10 items-center justify-center text-transparent m-1">
                        <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                        </svg>
                      </div>
                @endfor
                <p class="font-bold text-base mb-1 mt-4">
                    Campaign details:                   
                </p>
               
                <p class="text-xs  mb-1">
                  Category: {{ $stamp->category->name ?? "No Category" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                  Venue: {{ $stamp->venue->title ?? "No Venue" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Manager: {{ $stamp->manager_email ?? "No manager" }}                   
                    </p>

                  <p class="text-xs  mb-1">
                    Available through: {{ $stamp->available_through ?? "" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                  @foreach ($rewards as $reward)
                        @if ($reward->id == $stamp->reward_id)
                          Reward: {{ $reward->title ?? "No reward" }} 
                              <a href="/coupons/{{ $reward->slug }}">
                                      <span class="text-xs text-indigo-700 italic hover:text-indigo-900 pb-1 mb-3">
                                          See reward ->
                                      </span>
                              </a>  
                        @endif
                  @endforeach
                  @if ($stamp->reward_id == NULL)
                          Reward: No reward 
                  @endif
                  </p>
                  <p class="text-xs  mb-1">
                    YouTube: {{ $stamp->video_yt_id ?? "No video" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Full screen: {{ $stamp->image_fs_path ? "Yes" : "No full screen image" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Stamps to collect per purchase: {{ $stamp->add_x_stamps ?? "" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                  Total stamps: {{ $stamp->total_stamps ?? "" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                      Campaign reset time:
                      {{ $stamp->reset_time ?? "no limits" }} {{ $stamp->reset_time ? $stamp->type_of_reset_time : ""}}                
                  </p>
                  <p class="text-xs  mb-3 md:mb-1">
                      Time to complete all stamps:
                      {{ $stamp->x_time_to_redeem ?? "till end of the campaign" }} {{ $stamp->x_time_to_redeem ? $stamp->type_of_period_to_redeem : ""}}               
                  </p>
                  <p class="text-xs  mb-1">
                    Gender rules: {{ $stamp->gender ?? "" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Age rules: {{ $stamp->age[0] ?? "" }}                   
                  </p>
                  <p class="text-xs  mb-1">
                    Scheduled days of the week: {{ $stamp->scheduled_days ? $stamp->scheduled_days->implode(', ') : "" }}                   
                  </p>
                  
                  <p class="text-xs  mb-3 md:mb-1">
                    Scheduled time of the day: 
                    @if ($stamp->start_time || $stamp->end_time)
                      {{ date('H:i', strtotime($stamp->start_time)) }} - {{ date('H:i', strtotime($stamp->end_time)) }}
                    @endif
                  </p>
                  <p class="text-xs  mb-3 mt-2 md:mb-6">
                    Campaign valid between:
                    {{ $stamp->start_date ? date('j M, Y', strtotime($stamp->start_date)) : " "}} - {{ $stamp->end_date ? date('j M, Y', strtotime($stamp->end_date)) : "" }}
                  </p>
                
      
              </div>
            </div>
          </a>
              
            
          <div class="flex space-x-1 mb-1 mx-5">
            <div class="flex-1 w=4/5 m-auto text-left">
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
            <div class="flex-1 w=4/5 m-auto text-center">
                <form 
                  action="/stamps/mail/{{ $stamp->id }}"
                  method="POST">
                  @csrf
                  
                    <button 
                        type="submit"
                        class=" bg-pink-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                        Mail
                    </button>
                </form>
            </div>

            <div class="flex-1 w=4/5 m-auto text-right">
              
                  <a 
                      href="/stamps/{{ $stamp->slug }}/edit"
                      class="bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                  Edit
                  </a>
            </div>
          </div>
                <div class="m-6">
                    <img
                      class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                      src="{{ asset('storage/images/qrcodes/' . $stamp->qrcode_path) }}"
                      alt=""
                    />
                </div>
            </div>

              {{-- @endif --}}
            @endforeach
              
        
      </div>
  </div>



</x-app-layout>