<div class="w-full flex items-center">
    {{-- <form wire:submit.prevent="save"> --}}
        {{-- <input name="logo" type="file" wire:model="logo" class=""> --}}
        <div class="w-1/4">
            <label class="cursor-pointer">
                <span class="focus:outline-none text-white text-xs md:text-sm py-2 px-3 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Choose Map Icon</span>
                <input name="map_icon" type="file" class="hidden" :multiple="multiple" :accept="accept" wire:model="image">
            </label>
        </div>
        
        
        <div class="w-3/4">
            <div class="w-full h-20 flex-none rounded-xl border overflow-hidden">
                @if ($image)
                    <img class="p-1 mx-auto h-full object-cover" src="{{ $image->temporaryUrl() }}">
                @endif
            </div>
           
        </div>

        
        
        {{-- @error('logo') <span class="error">{{ $message }}</span> @enderror
         
        <button type="submit">Save Image</button>
    </form> --}}
</div>
