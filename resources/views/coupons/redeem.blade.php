<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot> --}}

    <div class="sm:flex container my-8 mx-auto w-full sm:w-1/4">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="mx-auto text-3xl">
               
            </h2>
        </div>
        
        <div class="flex-none sm:flex-1 w-screen md:w-2/5 w-max-350px h-250 h-max-350px mx-auto md:pb-4 border rounded-lg">

              <div class="aspect-w-16 aspect-h-9">
                <img
                  class="object-cover w-full shadow-md hover:shadow-xl rounded-lg"
                  src="{{ asset('storage/images/loyalty/' . $coupon->image_path) }}"
                  alt=""
                />
              </div>

              <div class="px-4 py-2 mt-2">
                <div class="text-lg leading-6 font-medium space-y-1">
                    <h3 class="text-center font-bold text-gray-800 text-lg md:text-2xl mb-2">
                    {{ $coupon->title }}
                  </h3>
                </div>
                
                <div class="text-md">
                    
                    @if($myCoupon->redeemed)
                    <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl opacity-50">
                        {{ $myCoupon->redeemed ? "Redeemed" : "Ready to redeem" }}                  
                    </p>
                    @else
                    <p class="text:lg md:text-xl my-4 text-center bg-yellow-300 text-gray-600 font-bold py-2 px-3 rounded-3xl">
                        {{ $myCoupon->redeemed ? "Redeemed" : "Ready to redeem" }}                  
                    </p>
                    
                    <p class="text-center font-bold text-sm md:text-base">
                        Show qr code to seller to redeem coupon                  
                    </p>

                    <div class="w-4/5 mb-1 mx-auto border-b-2 border-gray-200">
                        <br>
                    </div>

                    <div class="aspect-w-16 aspect-h-9 my-5">
                        <a href="{{ asset('storage/images/qrcodes/' . $redeemQrcodePath) }}">
                            <img
                            class="w-3/4 mx-auto mt-5 shadow-md hover:shadow-xl rounded-lg"
                            src="{{ asset('storage/images/qrcodes/' . $redeemQrcodePath) }}"
                            alt=""
                            />
                        </a>
                    </div>

                    {{-- <div class="flex-1 w=4/5 m-auto text-center">
                        <form 
                            action="/coupons/redeem/{{ $coupon->id }}/{{ auth()->user()->id }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    
                            <button 
                                type="submit"
                                class="bg-pink-700 text-gray-100 text-sm font-extrabold py-2 px-3 rounded-3xl">
                                Redeem
                            </button>            
                        </form>
                    </div> --}}
                    @endif
                </div>
              </div>
          </div>
    </div>


    

</x-app-layout>