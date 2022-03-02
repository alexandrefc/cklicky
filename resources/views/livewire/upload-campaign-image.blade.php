<div class="grid grid-cols-1 mt-6 mx-7">
    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload image</label>
      <div class='flex items-center justify-center w-full'>
       
            <label class='flex flex-col border-4 border-dashed w-full sm:w-1/2 h-52 hover:bg-gray-100 hover:border-purple-300 group'>
                <div class='flex flex-col h-52 items-center my-auto justify-center pt-1'>
                  @if ($image)
                    <img class="p-1 mt-3 mx-auto h-full object-cover" src="{{ $image->temporaryUrl() }}">
                    @endif
                  <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                  @if ($image)
                    <p class=' text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Change image</p>
                  @else
                    <p class=' text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Choose image</p>
                  @endif
                    
                  <input name="image" type="file" class="hidden" wire:model="image" >
  
                </div>
            </label>
          
      </div>
  </div>
 