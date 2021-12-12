<li {{ $attributes->class([
        'py-2 px-3 focus:outline-none transition-colors ease-in-out duration-50 relative group',
        'text-gray-600 dark:text-gray-400',
        'cursor-pointer focus:bg-indigo-100 focus:text-indigo-800 hover:text-gray-700' => !($readonly || $disabled),
        'dark:focus:bg-gray-700' => !($readonly || $disabled),
        'opacity-60 cursor-not-allowed' => $disabled
    ])->merge([
        'data-label' => $label,
        'data-value' => $value,
    ]) }}
    @unless($readonly || $disabled)
        tabindex="0"
        x-on:click="select('{{ $value }}')"
        x-on:keydown.enter="select('{{ $value }}')"
    @endunless
    :class="{
        'font-semibold': isSelected('{{ $value }}'),
        @if (!($readonly || $disabled))
            'hover:bg-red-300 dark:hover:text-gray-100': isSelected('{{ $value }}'),
            'hover:bg-indigo-200 dark:hover:bg-gray-700': !isSelected('{{ $value }}'),
        @endif
    }">
    {!! $label ?? $slot !!}

    <div class="absolute inset-y-0 right-0 flex items-center pr-4"
        x-show="isSelected('{{ $value }}')">
        <x-dynamic-component
            :component="WireUiComponent::resolve('icon')"
            name="check"
            class="w-5 h-5 text-indigo-600 dark:text-gray-500 group-hover:text-white"
        />
    </div>
</li>
