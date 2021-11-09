<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    @if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 mr-6 text-gray-50 bg-red-700 rounded-2xl py-2 px-4 inline">
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
            <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Update coupon</h1>
          </div>
        </div>
        <form 
          action="/coupons/{{ $coupon->slug }}"
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
                      value="{{ $coupon->title }}"
                      required="" />
              </div>
              <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Short description</label>
                  <textarea 
                      class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                      placeholder="{{ $coupon->description }}"
                      name="description" 
                      id="description" 
                      cols="30" rows="3">
                  </textarea>
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
                  <label class="md:text-sm text-xs text-gray-500 text-light font-extrabold">Manager email</label>
                  <input 
                      class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                      name="managerEmail" 
                      type="email" 
                      value="{{ $coupon->manager_email }}" />
              </div>

              <div class="grid grid-cols-1 mt-5 mx-7">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Category</label>
                  <select 
                      class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                      name="category"
                      value="{{ $coupon->category_id }}">
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}"
                              @if ($coupon->category_id == $category->id) 
                              selected='selected'
                              @endif >{{ $category->name }}</option>
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
                      placeholder="dd-mm-yy" />
                  </div>
                  <div class="grid grid-cols-1">
                      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                          End date
                      </label>
                      <input 
                          class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                          name="endDate"
                          type="date" 
                          placeholder="dd-mm-yy" />
                  </div>
              </div>

              {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                  <div class="grid grid-cols-1">
                      <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">
                          Award points
                      </label>
                      <input 
                          class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" 
                          name="xPoints"
                          type="number" 
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
                          placeholder="Amount of points user has to collect" />
                  </div>
              </div> --}}

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
                        placeholder="1" />
                </div>
                <div class="grid grid-cols-1">
                      <select 
                          class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                          name="period">
                              <option value="minutes">Minutes</option>
                              <option value="hours">Hours</option>
                              <option value="days">Days</option>
                              <option value="months">Months</option>
                      </select>
                </div>
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
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Make it available through</label>
          <select 
              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
              name="availableThrough">
            <option value="web">Webpage</option>
            <option value="mail">Send by mail</option>
            <option value="all">All</option>
            <option value="reward">As a Reward</option>
          </select>
        </div>

        <div class="grid grid-cols-1 mt-5 mx-7">
          <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Please select a base venue</label>
          <select 
              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
              name="venue_id">
              @foreach ($venues as $venue)
                <option 
                    value="{{ $venue->id }}"
                    @if ($coupon->venue_id == $venue->id) 
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
                @foreach ($coupons as $coupon)
                    <option 
                        value="{{ $coupon->id }}"
                        @if ($coupon->reward_id == $coupon->id) 
                            selected='selected'
                        @endif >
                    {{ $coupon->title }}
                    </option>
                @endforeach
            </select>
        </div>
        
    
        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
          <button 
            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
            type="" >Cancel</button>
          <button 
            class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'
            type="submit">Create</button>
        </div>
    
      </div>
    </div>
  </form>

{{-- <div class="w-4/5 m-auto text-left">
  <div class="py-15">
      <h1 class="text-6xl">
          Point creator
      </h1>
  </div>
</div>

@if ($errors->any())
  <div class="w-4/5 m-auto">
      <ul>
          @foreach ($errors->all() as $error)
              <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                  {{ $error }}
              </li>
          @endforeach
      </ul>
  </div>
  
@endif



<div class="w=4/5 m-auto pt-20">
  <form 
      action="/points"
      method="POST"
      enctype="multipart/form-data">
      @csrf

      <input 
          type="text"
          name="title"
          placeholder="Title..."
          class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

      <input 
          type="text"
          name="managerEmail"
          placeholder="Manager Email"
          class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

      <textarea 
          name="description"
          placeholder="Description...."
          class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"
      ></textarea>

      <label for="xPoints">Number of points to add:</label>
          <input 
              type="number"
              name="xPoints"
              placeholder="Number of points to add"
              class="bg-transparent border-b-2 w-16 h-10 pt-10 text-xl outline-none inline-block mr-5">
      
      <label for="maxPoints">Max Number of points:</label>
          <input 
              type="number"
              name="maxPoints"
              placeholder="Number of points to add"
              class="bg-transparent border-b-2 w-16 h-10 pt-10 text-xl outline-none inline-block mr-5">
  
      <label for="valid_till">Valid till:</label>
          <input type="date" id="valid_till" name="valid_till" placeholder="yyyy-mm-dd hh-mm-ss">

      <label for="xTimeToRedeem">Valid by for user:</label>
          <input 
              type="number"
              name="xTimeToRedeem"
              class="bg-transparent border-b-2 w-16 h-10 pt-10 text-xl outline-none inline-block mr-5">
      
          <select name="period" id="period">
              <option value="minutes">Minutes</option>
              <option value="hours">Hours</option>
              <option value="days">Days</option>
              <option value="months">Months</option>
          </select>
      
      <label for="availibility">Availibility:</label>
          <select name="availibility" id="availibility">
              <option value="onlyMail">Mail</option>
              <option value="onlyWeb">Website</option>
              <option value="all">All</option>
          </select>

      <div class="bg-gray-lighter pt-15">
          
          <label class="flex flex-col-2 px-2 py-3 bg-white-rounded-lg shadow-lg 
          tracking-wide border border-blue cursor-pointer">
              <span class="mt-2 text-center items bg-center leading-normal">
              Select Image:
              </span>
              <input 
                  type="file"
                  name="image"
                  class="ml-5">
          </label>
      </div>

     
      <label for="venueId">Choose a venue:</label>

          <select name="venueId" id="venueId">
              @foreach ($venues as $venue)
              <option value="{{ $venue->id }}">{{ $venue->title }}</option>
              @endforeach
          </select>

      

      <button 
          type="submit"
          class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
          Create point
      </button>

  </form> --}}

</div>

<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Edit coupon
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
    
@endif

<div class="w=4/5 m-auto pt-20">
    <form 
        action="/coupons/{{ $coupon->slug }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input 
            type="text"
            name="title"
            value="{{ $coupon->title }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea 
            name="description"
            placeholder="Description...."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"
            >{{ $coupon->description }}</textarea>
        
            <label for="valid_till">Valid till:</label>
            <input type="date" id="valid_till" name="valid_till" placeholder="yyyy-mm-dd hh-mm-ss">

        <div class="bg-gray-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg 
            tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    {{ $coupon->description }}
                </span>
                <input 
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Update Coupon
        </button>

    </form>

</div>

</x-app-layout>