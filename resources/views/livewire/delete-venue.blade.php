<div>
    {{-- <div class="mt-5">
        <x-jet-danger-button wire:click="confirmCampaignDeletion" wire:loading.attr="disabled">
            {{ __('Delete Campaign') }}
        </x-jet-danger-button>
    </div> --}}

    <button wire:click="confirmVenueDeletion" wire:loading.attr="disabled"
        type="submit"
        class=" bg-red-600 hover:bg-red-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
        Delete
    </button>
    

    <!-- Delete Campaign Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingVenueDeletion">
        <x-slot name="title">
            {{ __('Deleting venue') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your venue ?') }}
            <br>
            {{ __('Once the venue is deleted, all of its resources and data will be permanently deleted. ') }}

           
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelVenueDeletation()" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteVenue()" wire:loading.attr="disabled">
                {{ __('Delete Venue') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>