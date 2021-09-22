<div>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="image">
        
        @error('image') <span class="error">{{ $message }}</span> @enderror
         
        <button type="submit">Save Image</button>
    </form>
</div>
