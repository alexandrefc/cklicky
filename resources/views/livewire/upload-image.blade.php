<div>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="image">

        @if ($image)
        Photo Preview:
        <img src="{{ $image->temporaryUrl() }}">
        @endif
        
        @error('image') <span class="error">{{ $message }}</span> @enderror
         
        <button type="submit">Save Image</button>
    </form>
</div>
