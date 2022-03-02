<div class="">

    
    <button wire:click="confirmSendMailing" wire:loading.attr="disabled"
        
    type="submit"
        class=" bg-pink-500 hover:bg-pink-400 text-gray-100 text-xs font-extrabold py-2 px-3 rounded-3xl">
        Mail
    </button>

<!-- Send Mail Confirmation Modal -->
<div class="m-auto text-left">
    <x-jet-dialog-modal  wire:model="confirmingSendMailing">
        <x-slot name="title">
            {{ __('Send mailing') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to send this campaign to all your users? ') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelSendMailing()" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <div class="inline-flex">
                <form 
                  action="/stamps/mail/{{ $campaignId }}"
                  method="POST">
                  @csrf
                  
                  <x-jet-button class="ml-2">
                    {{ __('Send Mailing') }}
                </x-jet-button>
            </form>
            </div>

            
        </x-slot>
    </x-jet-dialog-modal>
</div>
    
</div>
