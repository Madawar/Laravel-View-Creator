<div>
    <label class="block text-sm font-medium text-gray-800 leading-loose">{{ $label }}</label>
    <p class="text-sm leading-5 text-gray-500">{{ $description }}</p>
    <fieldset class="mt-4">
        <legend class="sr-only">{{ $label }}</legend>
        <div @class([
            'space-y-4',
            'sm:flex sm:items-center sm:space-y-0 sm:space-x-10' => $inline,
        ])>
            @foreach ($options as $key => $option)
                <div class="flex items-center">
                    <input id="{{ $key }}" name="{{ $name }}" type="radio" checked
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                    <label for="{{ $key }}" class="ml-3 block text-sm font-medium text-gray-700">
                        {{ $option }}
                    </label>
                </div>
            @endforeach
        </div>
    </fieldset>
</div>
