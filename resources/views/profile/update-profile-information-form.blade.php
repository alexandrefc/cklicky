<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-4/6" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-4/6" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

         <!-- Testing Email -->
         <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="test_email" value="{{ __('User test account email') }}" />
            <x-jet-input id="test_email" type="email" class="mt-1 block w-4/6" wire:model.defer="state.test_email" />
            <x-jet-input-error for="test_email" class="mt-2" />
        </div>

        <!-- Age, Gender, Category campaign preferences -->
        <div class="col-span-6 sm:col-span-6 uppercase bg-gray-100 p-1 rounded-md">
            <x-jet-label value="{{ __('Campaign preferences') }}" />
        </div>
        {{-- <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="age" value="{{ __('Age') }}" />
            <x-jet-input id="age" type="text" class="capitalize mt-1 block w-full" wire:model.defer="state.age" autocomplete="age" />
            <x-jet-input-error for="age" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="gender" value="{{ __('Gender') }}" />
            <x-jet-input id="gender" type="text" class="capitalize mt-1 block w-full" wire:model.defer="state.gender" autocomplete="gender" />
            <x-jet-input-error for="gender" class="mt-2" />
        </div> --}}
        {{-- <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="category" value="{{ __('Category') }}" />
            <x-jet-input id="category" type="text" class="capitalize mt-1 block w-full" wire:model.defer="state.category" autocomplete="category" />
            <x-jet-input-error for="category" class="mt-2" />
        </div> --}}

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="age" value="{{ __('Age ') }}" />
            <select 
                name="age"
                id="age"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                wire:model.defer="state.age"
                >
                <optgroup label="age">
                    <option value="all">All ages</option>
                    <option value="children">Children ( - 18 y.o.)</option>
                    <option value="youngs">Young adults (19 - 29 y.o.)</option>
                    <option value="adults">Adults (30 - 65 y.o.)</option>
                    <option value="seniors">Seniors (65 - y.o.)</option>
                </optgroup>
                
            </select>      
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="gender" value="{{ __('Gender ') }}" />
            <select 
                name="gender"
                id="gender"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                wire:model.defer="state.gender"
                >
                <optgroup label="Gender">
                    <option value="men">Men</option>
                    <option value="female">Female</option>
                    <option value="all">Not specified</option>
                </optgroup>
                
            </select>      
        </div>  
            
        
    </x-slot>


    <x-slot name="actions">
        <x-jet-action-message class="mr-3 text-green-500" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
