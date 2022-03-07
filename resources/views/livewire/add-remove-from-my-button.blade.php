<div class="flex-1 w=4/5 m-auto text-center">
    @if (auth()->check())
        @if (!$active)
            <div class="bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl w-3/4 mx-auto">
                <label 
                    class="cursor-pointer">
                    <input type="checkbox" class="hidden" wire:click="addToMy" wire:model="active">
                    Add to My
                </label>
            </div>
        @else
            <div class="bg-red-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl mx-auto">
                <label 
                    class=" cursor-pointer">
                    <input type="checkbox" class="hidden" wire:model="active" wire:click="removeFromMy">
                    Remove from my list
                </label>
            </div>
        @endif
    @else
        <form 
            action="/points/addtomy/{{ $campaign->id }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <button 
                type="submit"
                class="bg-yellow-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
                Add to My
            </button>
        </form>
    @endif    
</div>


