<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    <div class="sm:flex container my-8 mx-auto w-full sm:w-3/5">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="mx-auto text-3xl">
                {{-- {{ $point->title }} --}}
                
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
                  src="{{ asset('/images/loyalty/' . $coupon->image_path) }}"
                  alt=""
                />
              </div>

              

              <div class="px-4 py-2 mt-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                  <h3 class=" font-bold text-gray-800 text-3xl mb-2">
                    {{ $coupon->title }}
                  </h3>
                </div>
                
                

                <div class="text-md">
                    
                    <p class="mb-6">
                        {{ $coupon->description }}                   
                    </p>
                    <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                        Redeemed: {{ $myPoint->points_amount ?? "0" }}/{{ $point->total_points ?? "" }}                   
                    </p>
                    
                    <p class="font-bold text-base mb-1">
                    Campaign details:                   
                    </p>
                    <p class="text-sm mb-1">
                    Category: {{ $coupon->category->name ?? "No Category" }}                   
                    </p>
                    <p class="text-sm mb-1">
                    Venue: {{ $coupon->venue->title ?? "No Venue" }}                   
                    </p>
                    {{-- <p class="text-sm mb-1">
                    Points to collect per purchase: {{ $point->add_x_points ?? "" }}                   
                    </p> --}}
                    {{-- <p class="text-sm mb-1">
                    Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                    </p> --}}
                    <p class="text-sm mb-6">
                    Valid between:
                    {{ date('j M, Y', strtotime($coupon->start_date)) }} - {{ date('j M, Y', strtotime($coupon->end_date)) }}                  
                    </p>
                    {{-- <div class="flex space-x-1 mb-2">
                        <div class="flex-1 w=4/5 m-auto text-center">
                            <form 
                                action="/points/addtomy/{{ $point->id }}"
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
                                action="/points/confirmaddpoints/{{ $point->id }}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        
                                <button 
                                    type="submit"
                                    class="uppercase bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                    Add Points
                                </button>            
                            </form>
                        </div>
                    </div> --}}
                    
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
                
          
                </div>

                    {{-- <div class="aspect-w-16 aspect-h-9">
                        <img
                        class="object-cover mt-5 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}"
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
                {{ $point->title }}
              </h3>
            </div> --}}
            
            

            <div class="text-md">
                
                {{-- <p class="mb-6">
                    {{ $point->description }}                   
                </p> --}}
              
                {{-- <div class="flex space-x-1 mb-6">
                    <div class="flex-1 w=4/5 m-auto text-center">
                        <form 
                            action="/points/addtomy/{{ $point->id }}"
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
                            action="/points/confirmaddpoints/{{ $point->id }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    
                            <button 
                                type="submit"
                                class="uppercase bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                Add Points
                            </button>            
                        </form>
                    </div>
                </div> --}}
                <p class="font-bold text-base mb-1">
                    More details:                   
                </p>
                <p class="text-sm mb-1">
                Category: {{ $coupon->category->name ?? "No Category" }}                   
                </p>
                <p class="text-sm mb-1">
                Venue: {{ $coupon->venue->title ?? "No Venue" }}                   
                </p>
                {{-- <p class="text-sm mb-1">
                Points to collect per purchase: {{ $coupon->add_x_points ?? "" }}                   
                </p> --}}
                {{-- <p class="text-sm mb-1">
                Points collected: {{ "0" }}/{{ $point->total_points ?? "" }}                   
                </p> --}}
                <p class="text-sm mb-6">
                Valid between:
                {{ date('j M, Y', strtotime($coupon->start_date)) }} - {{ date('j M, Y', strtotime($coupon->end_date)) }}                  
                </p>
                <div class="flex-1 w=4/5 m-auto text-center">
                    <form 
                        action="/coupons/redeem/{{ $coupon->id }}/{{ auth()->user()->id }}"
                        method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                
                        <button 
                            type="submit"
                            class="uppercase bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                            Redeem
                        </button>            
                    </form>
                </div>
                
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
            <div class="w-4/5 mt-10 mb-10 mx-auto border-b-2 border-gray-200">
                <br>
            </div>
            
      
            </div>

                <div class="aspect-w-16 aspect-h-9 my-5">
                    <a href="{{ asset('images/qrcodes/' . $redeemQrcodePath) }}">
                        <img
                        class="w-3/4 mx-auto mt-5 shadow-md hover:shadow-xl rounded-lg"
                        src="{{ asset('images/qrcodes/' . $redeemQrcodePath) }}"
                        alt=""
                        />
                    </a>
                    
                </div>
          </div>

        
       
          
        {{-- </a> --}}
    
      </div>
          
        {{-- </div> --}}
    </div>

<div class="w-4/5 m-auto text-center py-16">
    <div class="">
        <h1 class="text-6xl">
            {{ $coupon->title }}
        </h1>
    </div>
</div>

<div class="sm:grid grid-cols-1 gap-20 w-1/3 mx-auto border-t border-gray-200 text-center">
    <div>
        <img class="inline" src="{{ asset('images/loyalty/' . $coupon->image_path) }}" width="700" alt="">
    </div>
    
    <div>
        {{-- <img src="{{ asset('images/qrcodes/' . $coupon->qrcode_path) }}" width="70" alt=""> --}}
        {{-- <h2 class="text-gray-700 font-bold text-5xl pb-4 pt-5">
            {{ $coupon->title }}
        </h2> --}}
        {{-- <span class="text-gray-500">
            Offered by <span class="font-bold italic text-gray-800">{{ $coupon->venue->name }}</span>
            , Valid till {{ date('jS M Y', strtotime($coupon->updated_at)) }}
        </span> --}}
        <p class="text-xl text-gray-700 leading-8 font-light">
            {{ $coupon->description }}                
        </p>
    </div>
</div>
{{-- <div class="blobk-inline w=4/5 m-auto pt-1 text-center">
    <form 
        action="/coupons/addtomy/{{ $coupon->id }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Add to favourites
        </button>
    </form>

</div>
<div class="block-inline w=4/5 m-auto pt-1 text-center">
    <form 
        action="/coupons/redeem/{{ $coupon->id }}/{{ auth()->user()->id }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Redeem
        </button>
    </form>
</div> --}}

{{-- @if (Auth::check() && Gate::allows('admin_only', auth()->user()) ) --}}
    <div class="pt-10 w-4/5 m-auto text-center">
        <img class="inline" src="{{ asset('images/qrcodes/' . $redeemQrcodePath) }}" width="300" alt="">
    </div>
   
{{-- @endif --}}


{{-- <input 
            type="text"
            name="redeemed"
            value="{{ $coupon->redeemed }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none"> --}}

</x-app-layout>