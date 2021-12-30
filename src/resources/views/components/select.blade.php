<div x-data="{ open: false, value:@entangle($name), label:'Please Choose' }">
    <label id="listbox-label" @class([
        'block text-sm font-medium text-gray-700',
        'sr-only' => $sronly,
    ])>
        {{ $label }}
    </label>
    <div class="mt-1 relative" {{ $attributes->merge([]) }}>

        <button type="button" @click="open = true" @class([
            'relative w-full  pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 sm:text-sm rounded-md',
            'bg-white border  border-gray-300  shadow-sm focus:ring-indigo-500 focus:border-indigo-500' => !$errors->has(
                $name,
            ),
            'border border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 ' => $errors->has(
                $name,
            ),
        ]) aria-haspopup="listbox"
            aria-expanded="true" aria-labelledby="listbox-label">
            <span class="block truncate" x-text="label">
                Please Choose
            </span>

            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <!-- Heroicon name: solid/selector -->
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <!--
      Select popover, show/hide based on select state.

      Entering: ""
        From: ""
        To: ""
      Leaving: "transition ease-in duration-100"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <ul x-show="open" @click.away="open = false" x-cloak x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
            <!--
        Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

        Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
      -->
            <li @click="value = ''; label = 'Please Choose';$dispatch('input', '');open = false"
                class="text-gray-900 cursor-default select-none relative  py-2 pl-3 pr-9 border-b" id="listbox-option-0"
                role="option">
                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                <span class="font-normal block truncate text-center">
                    Clear Selected Item
                </span>
                <span class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                    <!-- Heroicon name: solid/check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </span>
            </li>
            @foreach ($options as $key => $option)
                <li @click="value = '{{ $key }}'; label = '{{ $option }}';$dispatch('input', {{ $key }});open = false"
                    class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9" id="listbox-option-0"
                    role="option">
                    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                    <span class="font-normal block truncate">
                        {{ $option }}
                    </span>
                    <span x-cloak x-show="value === '{{ $key }}'"
                        class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4">
                        <!-- Heroicon name: solid/check -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            @endforeach
            <!-- More items... -->
        </ul>
    </div>
    @error($name)
        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
    @enderror
</div>
