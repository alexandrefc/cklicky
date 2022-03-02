{{-- <x-jet-action-section> --}}
    {{-- <x-slot name="title">
        {{ __('Delete Campaign') }}
    </x-slot> --}}

    {{-- <x-slot name="description">
        {{ __('Permanently delete your campaign.') }}
    </x-slot> --}}

    {{-- <x-slot name="content"> --}}
        {{-- <div class="max-w-xl text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
        </div> --}}

    <div>
        {{-- <div class="mt-5">
            <x-jet-danger-button wire:click="confirmCampaignDeletion" wire:loading.attr="disabled">
                {{ __('Delete Campaign') }}
            </x-jet-danger-button>
        </div> --}}

        <button wire:click="confirmCampaignDeletion" wire:loading.attr="disabled"
            type="submit"
            class=" bg-red-600 hover:bg-red-500 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
            Delete
        </button>
        

        <!-- Delete Campaign Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingCampaignDeletion">
            <x-slot name="title">
                {{ __('Deleting campaign') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your campaign?') }}
                <br>
                {{ __('Once the campaign is deleted, all of its resources and data will be permanently deleted. ') }}

               
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="cancelCampaignDeletation()" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteCampaign()" wire:loading.attr="disabled">
                    {{ __('Delete Campaign') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
    {{-- </x-slot> --}}
{{-- </x-jet-action-section> --}}
