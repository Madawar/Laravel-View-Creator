@php
$options = array_merge(
    [
        'enableTime' => 'false',
        'dateFormat' => 'Y-m-d',
    ],
    $options,
);
use Illuminate\Support\Str;
@endphp

<div wire:ignore wire:key='{{ Str::random(4) }}'>

    <label for="{{ $name }}" @class([
        'block text-sm font-medium text-gray-700',
        'sr-only' => $sronly,
    ])>{{ $label }}</label>

    <div @class([
        'mt-1 relative rounded-md shadow-sm',
        'relative rounded-md shadow-sm' => $errors->has($name),
    ])>

        <input @class([
            'block w-full sm:text-sm rounded-md pr-10',
            'shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' => !$errors->has(
                $name
            ),
            'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 ' => $errors->has(
                $name
            ),
        ]) type="text" name="{{ $name }}" id="{{ $name }}" wire:ignore
            x-data="{ value: @entangle($attributes->wire('model')), instance: undefined }" x-init="() => {
                $watch('value', value => instance.setDate(value, false));
                instance = flatpickr($refs.input, {{ json_encode((object) $options) }});
            }" x-ref="input" x-bind:value="value"
            {{ $attributes->merge([]) }} placeholder="{{ $placeholder }}"
            aria-describedby="{{ $name }}-description" />
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <!-- Heroicon name: solid/question-mark-circle -->

            @if (array_key_exists('noCalendar', $options))
                @svg('ri-time-line', 'h-5 w-5 text-gray-400')
            @else
                @svg('ri-calendar-2-line', 'h-5 w-5 text-gray-400')
            @endif

        </div>
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
    </div>
    @error($name)
        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
    @enderror
</div>
