<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cKlicky.com') }}
            
        </h2>
    </x-slot>

<div class="w-4/5 m-auto text-left">
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
                {{-- placeholder="Number of points to add" --}}
                class="bg-transparent border-b-2 w-36 h-20 pt-10 text-xl outline-none inline-block mr-5">
        
        <label for="valid_till">Valid till:</label>
            <input type="date" id="valid_till" name="valid_till" placeholder="yyyy-mm-dd hh-mm-ss">

        <div class="bg-gray-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg 
            tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                <input 
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>

       
        <label for="cars">Choose a venue:</label>

            <select name="venueId" id="venueId">
                @foreach ($venues as $venue)
                <option value="{{ $venue->id }}">{{ $venue->title }}</option>
                @endforeach
                {{-- <option value="1">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option> --}}
            </select>

        <button 
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Create point
        </button>

    </form>

</div>

</x-app-layout>