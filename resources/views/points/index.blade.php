<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>
    
    <div class="container my-8 mx-8">
        
      <div class="flex justify-between mb-4">
          <h2 class="font-semibold text-xl leading-tight">
              Your Point Campaigns
              <a href="/points/create" class=""
              ><span
                class="text-salmon font-medium text-lg ml-2 hover:underline"
                >+ Create new point
              </span></a
            >
              
          </h2>
      </div>
      
      
      <div
        id="scrollContainer"
        class="flex flex-no-wrap overflow-x-scroll scrolling-touch items-start mb-8"
      >
        @foreach ($points as $point)
              
              {{-- @if ((isset(Auth::user()->id) && Auth::user()->email == $point->manager_email) || (Auth::user()->id == $point->made_by_id)) --}}
                  
      
      <div
          class="flex-none w-3/4 sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/4 w-max-350px h-max-350px mr-8 md:pb-4 border rounded-lg">
        
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
                  
                  <p class="text-sm md:text-lg mb-8 h-10">
                      {{ $point->description }}                   
                  </p>
                  
                  <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                    Total points: {{ $point->add_x_points . "/" . $point->total_points ?? "" }}                   
                  </p>
                  <p class="font-bold text-base mb-1">
                      Campaign details:                   
                  </p>
                 
                  <p class="text-xs  mb-1">
                    Category: {{ $point->category->name ?? "No Category" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                    Venue: {{ $point->venue->title ?? "No Venue" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                      Manager: {{ $point->manager_email ?? "No manager" }}                   
                      </p>

                    <p class="text-xs  mb-1">
                      Available through: {{ $point->available_through ?? "" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                      @foreach ($rewards as $reward)
                            @if ($reward->id == $point->reward_id)
                              Reward: {{ $reward->title ?? "No reward" }} 
                                  <a href="/coupons/{{ $reward->slug }}">
                                          <span class="text-xs text-indigo-700 italic hover:text-indigo-900 pb-1 mb-3">
                                              See reward ->
                                          </span>
                                  </a>  
                            @endif
                      @endforeach
                      @if ($point->reward_id == NULL)
                              Reward: No reward 
                      @endif
                    </p>
                    <p class="text-xs  mb-1">
                      YouTube: {{ $point->video_yt_id ?? "No video" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                      Full screen: {{ $point->image_fs_path ? "Yes" : "No full screen image" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                    Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                    Total points: {{ $point->total_points ?? "" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                        Campaign reset time:
                        {{ $point->reset_time ?? "no limits" }} {{ $point->reset_time ? $point->type_of_reset_time : ""}}                
                    </p>
                    <p class="text-xs  mb-3 md:mb-1">
                        Time to complete all points:
                        {{ $point->x_time_to_redeem ?? "till end of the campaign" }} {{ $point->x_time_to_redeem ? $point->type_of_period_to_redeem : ""}}               
                    </p>
                    <p class="text-xs  mb-1">
                      Gender rules: {{ $point->gender ?? "" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                      Age rules: {{ $point->age[0] ?? "" }}                   
                    </p>
                    <p class="text-xs  mb-1">
                      Scheduled days of the week: {{ $point->scheduled_days ? $point->scheduled_days->implode(', ') : "" }}                   
                    </p>
                    
                    <p class="text-xs  mb-3 md:mb-1">
                      Scheduled time of the day: 
                      @if ($point->start_time || $point->end_time)
                        {{ date('H:i', strtotime($point->start_time)) }} - {{ date('H:i', strtotime($point->end_time)) }}
                      @endif
                    </p>
                    <p class="text-xs  mb-3 mt-2 md:mb-6">
                      Campaign valid between:
                      {{ $point->start_date ? date('j M, Y', strtotime($point->start_date)) : " "}} - {{ $point->end_date ? date('j M, Y', strtotime($point->end_date)) : "" }}
                    </p>
                </div>
              </div>
            </a>
              
              <div class="flex space-x-1 mb-1 mx-5">
                <div class="flex-1 w=4/5 m-auto text-left">
                    <form 
                    action="/points/{{ $point->slug }}"
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
                      action="/points/mail/{{ $point->id }}"
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
                          href="/points/{{ $point->slug }}/edit"
                          class="bg-pink-700 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                      Edit
                      </a>
                </div>
              </div>
              
                  <div class="m-6">
                      <img
                      class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                      src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
                      alt=""
                      />
                  </div>
            
        </div>
              {{-- @endif --}}
            @endforeach
        
      </div>
  </div>



</x-app-layout>