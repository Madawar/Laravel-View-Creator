<div>
    <label class="block text-sm font-medium text-gray-800 leading-loose">{{ $label }}</label>
    <p class="text-sm leading-5 text-gray-500">{{ $description }}</p>
    <fieldset @class([
        'space-y-4',
        'sm:flex sm:items-center sm:space-y-0 sm:space-x-10' => $inline,
    ])>
        <legend class="sr-only">{{ $label }}</legend>

        @foreach ($options as $key => $option)
            <div class="relative flex items-start">
                <div class="flex items-center h-5">
                    <input id="{{ $key }}" aria-describedby="{{ $name }}-description"
                        name="{{ $name }}" type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                    <label for="{{ $name }}" class="font-medium text-gray-700">{{ $option }}</label>
                    <!--
                    <span id="comments-description" class="text-gray-500"><span class="sr-only">New comments
                        </span>so you always know what's happening.</span>
                        -->
                </div>
            </div>
        @endforeach

    </fieldset>
</div>
