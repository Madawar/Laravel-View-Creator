<div>
    @if ($hint)
        <div class="flex justify-between">
            <label for="{{ $name }}"
                class="block text-sm font-medium text-gray-800 leading-loose">{{ $label }}</label>
            <span class="text-sm text-gray-500" id="{{ $name }}-optional">{{ $hint }}</span>
        </div>
    @else
        <label for="{{ $name }}" @class([
            'block text-sm font-medium text-gray-700',
            'sr-only' => $sronly,
        ])>{{ $label }}</label>
    @endif

    <div @class([
        'mt-1',
        'relative rounded-md shadow-sm' => $errors->has($name) || $icon,
    ])>
        @if ($icon && $icoplacement == 'leading')
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/mail -->
                {{ $slot }}
            </div>
        @endif
        <input @class([
            'block w-full sm:text-sm rounded-md',
            'pl-10' => $icoplacement == 'leading' ? true : false,
            'shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' => !$errors->has(
                $name,
            ),
            'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 ' => $errors->has(
                $name,
            ),
        ]) type="text" name="{{ $name }}" id="{{ $name }}"
            {{ $attributes->merge([]) }} placeholder="{{ $placeholder }}"
            aria-describedby="{{ $name }}-description">
        @error($name)
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/exclamation-circle -->
                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        @enderror
        @if ($icon && $icoplacement == 'trailing')
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/question-mark-circle -->
                {{ $slot }}

            </div>
        @endif
    </div>
    @isset($description)
        <p class="mt-2 text-sm text-gray-500" id="{{ $name }}-description">{{ $description }}</p>
    @endisset
    @error($name)
        <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $message }}</p>
    @enderror
</div>
