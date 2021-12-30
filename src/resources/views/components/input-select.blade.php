<div>

    <label for="price" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <span class="text-gray-500 sm:text-sm">
                KES
            </span>
        </div>
        <input @class([
            'block w-full sm:text-sm rounded-md pl-10 pr-14',
            'shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' => !$errors->has(
                $name_input,
            ),
            'pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 ' => $errors->has(
                $name_input,
            ),
        ]) type="text" name="{{ $name_input }}" id="{{ $name_input }}"
            wire:model='{{ $attributes->get('input:model') }}' placeholder="{{ $placeholder_input }}"
            aria-describedby="{{ $name_input }}-description">
        <div class="absolute inset-y-0 right-0 flex items-center">
            <label for="{{ $name_select }}" class="sr-only">Percentage</label>
            <select id="{{ $name_select }}" name="{{ $name_select }}"
                wire:model='{{ $attributes->get('select:model') }}'
                class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                @foreach ($selectOptions as $key => $rate)
                    <option value="{{ $key }}">{{ $rate }}</option>
                @endforeach


            </select>
        </div>
    </div>
    @error($name_input)
        <p class="mt-2 text-sm text-red-600" id="{{ $name_input }}-error">{{ $message }}</p>
    @enderror
    @error($name_select)
        <p class="mt-2 text-sm text-red-600" id="{{ $name_select }}-error">{{ $message }}</p>
    @enderror
</div>
