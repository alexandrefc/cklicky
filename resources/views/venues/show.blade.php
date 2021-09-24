<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>

<div class="w-4/5 m-auto text-center py-16">
    <div class="">
        <h1 class="text-6xl">
            {{ $venue->title }}
        </h1>
    </div>
</div>

<div class="sm:grid grid-cols-1 gap-20 w-1/3 mx-auto border-t border-gray-200 text-center">
    <div>
        <img class="inline" src="{{ asset('images/loyalty/' . $venue->logo_path) }}" width="700" alt="">
    </div>
    
    <div>
        {{-- <img src="{{ asset('images/qrcodes/' . $venue->qrcode_path) }}" width="70" alt=""> --}}
        {{-- <h2 class="text-gray-700 font-bold text-5xl pb-4 pt-5">
            {{ $venue->title }}
        </h2> --}}
        {{-- <span class="text-gray-500">
            Offered by <span class="font-bold italic text-gray-800">{{ $venue->venue->name }}</span>
            , Valid till {{ date('jS M Y', strtotime($venue->updated_at)) }}
        </span> --}}
        <p class="text-xl text-gray-700 leading-8 font-light">
            {{ $venue->description }}                
        </p>
    </div>
</div>
<div class="blobk-inline w=4/5 m-auto pt-1 text-center">
    <form 
        action="/venues/addtomy/{{ $venue->id }}"
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
        action="/venues/confirmaddvenues/{{ $venue->slug }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Add venues
        </button>
        

    </form>
</div>
{{-- <div class="block-inline w=4/5 m-auto pt-1 text-center">
    <form 
        action="/venues/addvenues/{{ $venue->id }}/{{ auth()->user()->id }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Add venues
        </button>
        

    </form>
</div> --}}

{{-- @if (Auth::check() && Gate::allows('admin_only', auth()->user()) ) --}}
    <div class="pt-10 w-4/5 m-auto text-center">
        <img class="inline" src="{{ asset('images/qrcodes/' . $venue->qrcode_path) }}" width="300" alt="">
    </div>
{{-- @endif --}}


{{-- <input 
            type="text"
            name="redeemed"
            value="{{ $venue->redeemed }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none"> --}}

            <div class="container my-8 mx-8">
                <div class="flex justify-between items-center mb-4">
                  <h2 class="text-3xl">
                    Your coupons
                    <a href="/coupons/create" class=""
                      ><span
                        class="text-salmon font-medium text-lg ml-2 hover:underline"
                        >Create new coupon
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
                @foreach ($venue->coupons as $coupon)
                  <div
                    class="flex-none w-2/3 md:w-1/4 w-max-350px h-250 h-max-350px mr-8 md:pb-4 border rounded-lg"
                  >
                    <a href="#" class="space-y-4">
                      <div class="aspect-w-16 aspect-h-9">
                        <img
                          class="object-cover shadow-md hover:shadow-xl rounded-lg"
                          src="{{ asset('/images/loyalty/' . $coupon->image_path) }}"
                          alt=""
                        />
                      </div>
        
                      
        
                      <div class="px-4 py-2">
                        <div class="text-lg leading-6 font-medium space-y-1">
                          <h3 class="font-bold text-gray-800 text-3xl mb-2">
                            {{ $coupon->title }}
                          </h3>
                        </div>
                        <div class="text-lg">
                          <p class="">
                            {{ $coupon->description }}                   </p>
                          <p class="font-medium text-sm text-indigo-600 mt-2">
                            Read more<span class="text-indigo-600">&hellip;</span>
                          </p>
                          <span class="float-right">
                            <a 
                                href="/coupons/{{ $coupon->slug }}"
                                class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                            Read more
                            </a>
                        </span>
                          
                        <span class="float-right">
                            <a 
                                href="/coupons/{{ $coupon->slug }}/edit"
                                class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                            Edit
                            </a>
                        </span>
        
                        <span class="float-right">
                            <form 
                                action="/coupons/{{ $coupon->slug }}"
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
                    Venue Points
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
                @foreach ($venue->points as $point)
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
                            {{ $point->description }}                   </p>
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
                </div>
            </div>

</x-app-layout>