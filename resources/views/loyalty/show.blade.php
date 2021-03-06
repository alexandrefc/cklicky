<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>

<<div class="w-4/5 m-auto text-center">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $point->title }}
        </h1>
    </div>
</div>

<div class="sm:grid grid-cols-1 gap-20 w-4/5 mx-auto py-15 border-t border-gray-200 text-center">
    <div>
        <img class="inline" src="{{ asset('images/' . $point->image_path) }}" width="700" alt="">
    </div>
    
    <div>
        {{-- <img src="{{ asset('images/qrcodes/' . $point->qrcode_path) }}" width="70" alt=""> --}}
        {{-- <h2 class="text-gray-700 font-bold text-5xl pb-4 pt-5">
            {{ $point->title }}
        </h2> --}}
        <span class="text-gray-500">
            Offered by <span class="font-bold italic text-gray-800">{{ $point->venue->name }}</span>
            , Valid till {{ date('jS M Y', strtotime($point->updated_at)) }}
        </span>
        <p class="text-xl text-gray-700 pt-8 leading-8 font-light">
            {{ $point->description }}                
        </p>
    </div>
</div>
<div class="w=4/5 m-auto pt-1 text-center">
    <form 
        action="/myloyalties/addpoints/{{ $point->id }}/{{ $point->user_id }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Add points
        </button>
        

    </form>

</div>

{{-- @if (Auth::check() && Gate::allows('admin_only', auth()->user()) ) --}}
    <div class="pt-10 w-4/5 m-auto text-center">
        <img class="inline" src="{{ asset('images/qrcodes/' . $qrcodeName) }}" width="300" alt="">
    </div>
{{-- @endif --}}


{{-- <input 
            type="text"
            name="redeemed"
            value="{{ $point->redeemed }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none"> --}}

</x-app-layout>