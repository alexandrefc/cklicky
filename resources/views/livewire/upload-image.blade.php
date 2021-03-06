<div class="w-full flex items-center">
    {{-- <form wire:submit.prevent="save"> --}}
        {{-- <input name="logo" type="file" wire:model="logo" class=""> --}}
        <div class="w-1/4">
            <label class="cursor-pointer ">
                <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse Image</span>
                <input name="image" type="file" class="hidden" :multiple="multiple" :accept="accept" wire:model="image">
            </label>
        </div>
        
        
        <div class="w-3/4">
            <div class="w-full h-20 mr-4 flex-none rounded-xl border overflow-hidden">
                @if ($image)
                    <img class="p-1 mx-auto h-full object-cover" src="{{ $image->temporaryUrl() }}">
                @endif
            </div>
           
        </div>

        
        
        {{-- @error('logo') <span class="error">{{ $message }}</span> @enderror
         
        <button type="submit">Save Image</button>
    </form> --}}
</div>
