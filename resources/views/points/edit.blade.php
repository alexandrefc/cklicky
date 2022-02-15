<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    
    @if ($errors->any())
      <div class="w-11/12 m-auto my-6">
          <ul>
              @foreach ($errors->all() as $error)
                  <li class="w-1/5 mb-4 mt-2 mr-2 text-gray-50 bg-red-700 text-xs md:text-sm rounded-2xl py-1 px-2 inline">
                      {{ $error }}
                  </li>
              @endforeach
          </ul>
      </div>
    @endif

    <div class="flex h-full bg-gray-100 items-center justify-center  pt-16 pb-32">
      
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">

            

          <div class="flex justify-center py-4">
            <div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
          </div>
      
          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Update point campaign</h1>
            </div>
          </div>
          <form 
            action="/points/{{ $point->slug }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="md:text-sm text-xs text-gray-500 text-light font-extrabold">Title</label>
                    <input 
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                        name="title" 
                        type="text" 
                        {{-- placeholder="{{ $point->title }}" --}}
                        value="{{ $point->title }}"
                        required="" />
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="md:text-sm text-xs text-gray-500 text-light font-extrabold">Short description</label>
                    <input 
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                        name="description" 
                        type="text" 
                        {{-- placeholder="{{ $point->title }}" --}}
                        value="{{ $point->description }}"
                        />
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">
                        Upload Photo
                    </label>
                    <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-24 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-1'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{-- <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a photo</p> --}}
                                <input type='file' name="image" class="" />
                            </div>
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload full screen image</label>
                      <div class='flex items-center justify-center w-full'>
                          <label class='flex flex-col border-4 border-dashed w-full h-24 hover:bg-gray-100 hover:border-purple-300 group'>
                              <div class='flex flex-col items-center justify-center pt-1'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{-- <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select a photo</p> --}}
                                <input type='file' name="imageFS" class="" />
                              </div>
                          </label>
                      </div>
                </div>
          
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="md:text-sm text-xs text-gray-500 text-light font-extrabold">YouTube video embed id</label>
                    <input 
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                        name="videoYtId" 
                        type="text" 
                        value="{{ $point->video_yt_id }}"
                        placeholder="eg. Ptld98KjPuM"
                         />
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="md:text-sm text-xs text-gray-500 text-light font-extrabold">Manager email</label>
                    <input 
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                        name="managerEmail" 
                        type="email" 
                        required=""
                        value="{{ $point->manager_email }}" />
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Category</label>
                    <select 
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        name="category"
                        value="{{ $point->category_id }}">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if ($point->category_id == $category->id) 
                                        selected='selected'
                                    @endif >{{ $category->name }}
                                </option>
                            @endforeach
                    </select>
                </div>
      
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                    <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Start date</label>
                    <input 
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                        name="startDate"
                        type="date" 
                            @if ($point->start_date)
                                value="{{ date('Y-m-d', strtotime($point->start_date)) }}"
                            @endif
                        placeholder="dd-mm-yyyy" />
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            End date
                        </label>
                        <input 
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                            name="endDate"
                            type="date" 
                                @if ($point->end_date)
                                    value="{{ date('Y-m-d', strtotime($point->end_date)) }}" 
                                @endif
                            placeholder="dd-mm-yyyy" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Award points
                        </label>
                        <input 
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                            name="xPoints"
                            type="number" 
                            required=""
                            value="{{ $point->add_x_points }}"
                            placeholder="How many points should be awarded" />
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                            Total points
                        </label>
                        <input 
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                            name="totalPoints" 
                            type="number" 
                            required=""
                            value="{{ $point->total_points }}"
                            placeholder="Amount of points user has to collect" />
                    </div>
                </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            
            {{-- <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Award Reset Time</label>
              <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                name="timeReset"
                type="number" 
                placeholder="Award Timeframe" />
            </div> --}}
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Valid by for user</label>
              <div class="grid grid-cols-2 gap-5 md:gap-8">
                  <div class="grid grid-cols-1">
                      <input 
                          class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                          name="xTimeToRedeem" 
                          type="number" 
                          value="{{ $point->x_time_to_redeem }}"
                          placeholder="" />
                  </div>
                  <div class="grid grid-cols-1">
                        <select 
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="period">
                                <option value="minutes" 
                                    @if ($point->type_of_period_to_redeem == 'minutes') 
                                        selected='selected'
                                    @endif>
                                        Minutes
                                </option>
                                <option value="hours" 
                                    @if ($point->type_of_period_to_redeem == 'hours') 
                                        selected='selected'
                                    @endif>
                                        Hours
                                </option>
                                <option value="days" 
                                    @if ($point->type_of_period_to_redeem == 'days') 
                                        selected='selected'
                                    @endif>
                                        Days
                                </option>
                                
                                <option value="months" 
                                    @if ($point->type_of_period_to_redeem == 'months') 
                                        selected='selected'
                                    @endif>
                                        Months
                                </option>
                        </select>
                  </div>
              </div>
              
            </div>
            
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Award Reset Time</label>
                <div class="grid grid-cols-2 gap-5 md:gap-8">
                    <div class="grid grid-cols-1">
                        <input 
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                            name="timeReset" 
                            type="number" 
                            value="{{ $point->reset_time }}"
                            placeholder="Award Timeframe" />
                    </div>
                    <div class="grid grid-cols-1">
                          <select 
                              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                              name="timeResetPeriod">
                                <option value="minutes" 
                                    @if ($point->type_of_reset_time == 'minutes') 
                                        selected='selected'
                                    @endif>
                                        Minutes
                                </option>
                                <option value="hours" 
                                    @if ($point->type_of_reset_time == 'hours') 
                                        selected='selected'
                                    @endif>
                                        Hours
                                </option>
                                <option value="days" 
                                    @if ($point->type_of_reset_time == 'days') 
                                        selected='selected'
                                    @endif>
                                        Days
                                </option>
                                <option value="months" 
                                    @if ($point->type_of_reset_time == 'months') 
                                        selected='selected'
                                    @endif>
                                        Months
                                </option>
                          </select>
                    </div>
                </div>
                
              </div>
            
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            
            
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Age rules</label>
              
                  
                  <div class="grid grid-cols-1">
                        <select 
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="age[]">
                                <option value="all" 
                                    @if ($point->age->contains("all")) 
                                        selected='selected'
                                    @endif>
                                        All ages
                                </option>
                                <option value="children" 
                                    @if ($point->age->contains("children")) 
                                        selected='selected'
                                    @endif>
                                        Children ( - 18 y.o.)
                                </option>
                                <option value="youngs" 
                                    @if ($point->age->contains("youngs")) 
                                        selected='selected'
                                    @endif>
                                        Young adults (19 - 29 y.o.)
                                </option>
                                <option value="adults" 
                                    @if ($point->age->contains("adults")) 
                                        selected='selected'
                                    @endif>
                                        Adults (30 - 65 y.o.)
                                </option>
                                <option value="seniors" 
                                    @if ($point->age->contains("seniors")) 
                                        selected='selected'
                                    @endif>
                                        Seniors (65 - y.o.)
                                </option>
                        </select>
                  </div>
              
              
            </div>

            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Gender rules</label>
              
                  
                  <div class="grid grid-cols-1">
                        <select 
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="gender"
                            id="gender">
                                <option value="all" 
                                    @if ($point->gender == 'all') 
                                        selected='selected'
                                    @endif>
                                        Men & Women
                                </option>
                                <option value="men" 
                                    @if ($point->gender == 'men') 
                                        selected='selected'
                                    @endif>
                                        Men
                                </option>
                                <option value="women" 
                                    @if ($point->gender == 'women') 
                                        selected='selected'
                                    @endif>
                                        Women
                                </option>
                        </select>
                  </div>
              
              
            </div>
            
            {{-- <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Award Reset Time</label>
                <div class="grid grid-cols-2 gap-5 md:gap-8">
                    <div class="grid grid-cols-1">
                        <input 
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                            name="timeReset" 
                            type="number" 
                            placeholder="Award Timeframe" />
                    </div>
                    <div class="grid grid-cols-1">
                          <select 
                              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                              name="timeResetPeriod">
                                  <option value="minutes">Minutes</option>
                                  <option value="hours">Hours</option>
                                  <option value="days">Days</option>
                                  <option value="months">Months</option>
                          </select>
                    </div>
                </div>
                
              </div> --}}
            
          </div>

          

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Schedule rules: week days</label>
            
              <div 
                class=" text-xs py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <input class="rounded mr-1" type="checkbox" name="scheduled_days[]" id="scheduleAll" value="8"
                    @if ($point->scheduled_days && $point->scheduled_days->contains('8')) 
                        checked
                    @endif
                ></option>
                <label for="scheduleAll">All</label>
                <input class="rounded mr-1" type="checkbox" name="scheduled_days[]" id="schedule1" value="1"
                    @if ($point->scheduled_days && $point->scheduled_days->contains('1')) 
                        checked
                    @endif
                ></option>
                <label for="schedule1">Monday</label>
                <input class="rounded mr-1 ml-2" type="checkbox" name="scheduled_days[]" id="schedule2" value="2"
                    @if ($point->scheduled_days && $point->scheduled_days->contains('2')) 
                        checked
                    @endif
                ></option>
                <label for="schedule2">Tuesday</label>
                <input class="rounded mr-1 ml-2" type="checkbox" name="scheduled_days[]" id="schedule3" value="3"
                    @if ($point->scheduled_days && $point->scheduled_days->contains('3')) 
                        checked
                    @endif
                ></option>
                <label for="schedule3">Wednsday</label>
                <input class="rounded mr-1 ml-2" type="checkbox" name="scheduled_days[]" id="schedule4" value="4"
                    @if ($point->scheduled_days && $point->scheduled_days->contains('4')) 
                        checked
                    @endif
                ></option>
                <label for="schedule4">Thursday</label>
                <input class="rounded mr-1 ml-2" type="checkbox" name="scheduled_days[]" id="schedule5" value="5"
                    @if ($point->scheduled_days && $point->scheduled_days->contains('5')) 
                        checked
                    @endif
                ></option>
                <label for="schedule5">Friday</label>
                <input class="rounded mr-1 ml-2" type="checkbox" name="scheduled_days[]" id="schedule6" value="6"
                    @if ($point->scheduled_days && $point->scheduled_days->contains('6')) 
                        checked
                    @endif
                ></option>
                <label for="schedule6">Saturday</label>
                <input class="rounded mr-1 ml-2" type="checkbox" name="scheduled_days[]" id="schedule7" value="7"
                    @if ($point->scheduled_days && $point->scheduled_days->contains('7')) 
                        checked
                    @endif
                ></option>
                <label for="schedule7">Sunday</label>
              </div>
            
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Schedule rules: show from time</label>
              <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                name="start_time"
                type="time" 
                    @if ($point->start_time)
                        value="{{ date('H:i', strtotime($point->start_time)) }}"
                    @endif
                placeholder="" />
            </div>
            <div class="grid grid-cols-1">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Schedule rules: show to time</label>
              <input 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                name="end_time"
                type="time" 
                    @if ($point->end_time)
                        value="{{ date('H:i', strtotime($point->end_time)) }}"
                    @endif
                placeholder="" />
            </div>
        </div>

        {{-- <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Schedule rules</label>
            
            <div
                x-data
                x-init="flatpickr($refs.datetimewidget, {wrap: true, enableTime: true, dateFormat: 'M j, Y h:i K'});"
                x-ref="datetimewidget"
                class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-1">
                    <div class="flex align-middle align-content-center">
                        <input
                            x-ref="datetime"
                            type="text"
                            id="datetime"
                            data-input
                            placeholder="dd.mm.yyyy"
                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>
            </div>
        </div> --}}
      
        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Make it available through</label>
            <select 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                name="availableThrough"
                required="">
                    <option value="all" 
                        @if ($point->available_through == 'all') 
                            selected='selected'
                        @endif>
                            All
                    </option>
                    <option value="web" 
                        @if ($point->available_through == 'web') 
                            selected='selected'
                        @endif>
                            Webpage
                    </option>
                    <option value="mail" 
                        @if ($point->available_through == 'mail') 
                            selected='selected'
                        @endif>
                            Send by mail
                    </option>
                    
                    <option value="reward" 
                        @if ($point->available_through == "reward") 
                            selected='selected'
                        @endif>
                        As a Reward
                    </option>
            </select>
        </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Please select a base venue</label>
            <select 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                name="venue_id"
                value="{{ $point->venue_id }}">
                    @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}"
                            @if ($point->venue_id == $venue->id) 
                                selected='selected'
                            @endif >
                            {{ $venue->title }}
                        </option>
                    @endforeach
            </select>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Please select a reward</label>
            <select 
                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                name="reward_id">
                {{-- <optgroup label="Point campaigns">
                  @foreach ($points as $point)
                    <option value="{{ $point->id }}">{{ $point->title }}</option>
                  @endforeach --}}
                <option value="0"
                    @if ($point->reward_id == 0) 
                        selected='selected'
                    @endif>
                    Without reward
                </option>
                <optgroup label="Coupon campaigns">
                    @foreach ($coupons as $coupon)
                        <option value="{{ $coupon->id }}"
                            @if ($point->reward_id == $coupon->id) 
                                selected='selected'
                            @endif >
                                {{ $coupon->title }}
                        </option>
                    @endforeach
              </optgroup>
            </select>
          </div>
      
          
      
          
      
          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button 
              class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
              type="reset" >Cancel</button>
            <button 
              class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
              type="submit">Update</button>
          </div>
      
        </div>
      </div>
    </form>


</div>



<script>
    var $select = document.getElementById("gender").multiple = false;
    
    // var $textAreaDescription = document.getElementById("description").value = "{{ $point->description }}";

    function check(checked = true) {
    const cbs = document.querySelectorAll('input[name="scheduled_days[]"]');
    cbs.forEach((cb) => {
        cb.checked = checked;
    });
    }

    const btn = document.querySelector('#scheduleAll');
    btn.onclick = checkAll; 

    function checkAll() {
        check();
        // reassign click event handler
        this.onclick = uncheckAll;
    }

    function uncheckAll() {
        check(false);
        // reassign click event handler
        this.onclick = checkAll;
    }
        
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/airbnb.min.css">
    

</x-app-layout>

