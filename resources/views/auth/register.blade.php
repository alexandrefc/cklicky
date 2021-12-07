<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="company_name" value="{{ __('Company Name') }}" />
                <x-jet-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="company_name" />
            </div>

            {{-- <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('Gender') }}" />
                <x-jet-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autofocus autocomplete="gender" />
            </div> --}}

            

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('Gender ') }} (Optional)" />
                <select 
                    name="gender"
                    id="gender"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model.defer="gender"
                    >
                    <optgroup label="Gender">
                        <option value="men">Men</option>
                        <option value="female">Female</option>
                        <option 
                            selected
                            value="all">Not specified</option>
                    </optgroup>
                    {{-- <optgroup label="Gender">
                    <option value="montreal">Montreal</option>
                    <option value="qc">Quebec City</option>
                    </optgroup> --}}
                </select>            
            </div>

            <div class="mt-4">
                <x-jet-label for="age" value="{{ __('Age ') }} (Optional)" />
                <select 
                    name="age"
                    id="age"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model.defer="age"
                    >
                    <optgroup label="Age">
                        <option selected value="all">All ages</option>
                        <option value="children">Children ( - 18 y.o.)</option>
                        <option value="youngs">Young adults (19 - 29 y.o.)</option>
                        <option value="adults">Adults (30 - 65 y.o.)</option>
                        <option value="seniors">Seniors (65 - y.o.)</option>
                        
                    </optgroup>
                    {{-- <optgroup label="Gender">
                    <option value="montreal">Montreal</option>
                    <option value="qc">Quebec City</option>
                    </optgroup> --}}
                </select>            
            </div>

            <div class="mt-4">
                <x-jet-label for="age" value="{{ __('Age') }} (Optional)" />
                <x-jet-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus autocomplete="age" />
            </div>

            

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
