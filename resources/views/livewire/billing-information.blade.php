<x-jet-form-section submit="updateBillingInformation">
    <x-slot name="title">
        {{ __('Billing Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s billing information that will appear on sales documents and invoices.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Company -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="company_name" value="{{ __('Company') }}" />
            <x-jet-input id="company_name" value="{{ $billing->company }}" type="text" class="mt-1 block w-full" wire:model.defer="company_name" />
            <x-jet-input-error for="company_name" class="mt-2" />
        </div>

        <!-- Tax id -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="tax_id" value="{{ __('Tax Id (EU VAT)') }}" />
            <x-jet-input id="tax_id" type="text" class="mt-1 block w-full" wire:model.defer="tax_id" />
            <x-jet-input-error for="tax_id" class="mt-2" />
        </div>
         
        <!-- Country -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="country" value="{{ __('Country') }}" />
            <x-jet-input id="country" type="text" class="mt-1 block w-full" wire:model.defer="country" />
            <x-jet-input-error for="country" class="mt-2" />
        </div>

        <!-- State / Province -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state" value="{{ __('State / Province') }}" />
            <x-jet-input id="state" type="text" class="mt-1 block w-full" wire:model.defer="state" />
            <x-jet-input-error for="state" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="street" value="{{ __('Street') }}" />
            <x-jet-input id="street" type="text" class="mt-1 block w-full" wire:model.defer="street" />
            <x-jet-input-error for="street" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="city" value="{{ __('City') }}" />
            <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="city" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-1">
            <x-jet-label for="post_code" value="{{ __('ZIP / Postal code') }}" />
            <x-jet-input id="post_code" type="text" class="mt-1 block w-full" wire:model.defer="post_code" />
            <x-jet-input-error for="post_code" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 text-green-500" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
