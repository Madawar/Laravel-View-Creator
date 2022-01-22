<div>
    <label for="{{ $name }}"
        class="block text-sm font-medium text-gray-800 leading-loose">{{ $label }}</label>
    <div class="mt-1">
        <textarea @class([
            'block w-full sm:text-sm border-gray-300 rounded-md',
            'shadow-sm focus:ring-indigo-500 focus:border-indigo-500' => !$errors->has(
                $name,
            ),
            'border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 ' => $errors->has(
                $name,
            ),
        ]) rows="{{ $rows }}" name="{{ $name }}"
            id="{{ $name }}" {{ $attributes->merge([]) }}></textarea>
        @error($name)
            <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
        @enderror
    </div>
</div>
