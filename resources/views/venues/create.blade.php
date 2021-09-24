<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>

    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                Venue creator
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
            action="/venues"
            method="POST"
            enctype="multipart/form-data">
            @csrf
    
            <input 
                type="text"
                name="title"
                placeholder="Name of the venue..."
                class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
    
            <textarea 
                name="description"
                placeholder="Venue informations...."
                class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"
                ></textarea>
            
                <label for="pin">PIN (4 digits):</label>
                <input type="number" id="pin" name="pin" placeholder="0000">
    
            <textarea 
                name="location"
                placeholder="Location of the venue:"
                class="py-20 bg-transparent block border-b-2 w-full h-10 text-xl outline-none"
            ></textarea>
    
            <div class="bg-gray-lighter pt-15">
                    <label for="logo" class="w-50 flex flex-col items-left px-2 py-3 bg-white-rounded-lg shadow-lg 
                    tracking-wide uppercase border border-blue cursor-pointer">
                        {{-- <span class="mt-2 text-base leading-normal">
                            Upload logo
                        </span> --}}
                        Upload logo
                    </label>
                        <input 
                            type="file"
                            name="logo"
                            id="logo"
                            >
                    
            </div>
    
            <button 
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Save venue
            </button>
    
        </form>
    
    </div>

</x-app-layout>