<div class="flex items-center" x-data="{value:@entangle($name)}"
    x-init="$watch('value', val => { $dispatch('input', val)})">
    <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
    <button type="button" :class="{ 'bg-indigo-600': value,'bg-gray-200':!value }" @click="value = !value"
        class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        role="switch" aria-checked="false" aria-labelledby="annual-billing-label">
        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
        <span aria-hidden="true" :class="{ 'translate-x-5': value,'translate-x-0':!value }"
            class=" pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
    </button>
    <span class="ml-3" id="annual-billing-label">
        <span @class([
            'text-sm font-medium text-gray-900',
            'sr-only' => $sronly,
        ])>{{ $title }} </span>
        <span @class([
            'text-sm text-gray-500',
            'sr-only' => $sronly,
        ])>({{ $subtitle }})</span>
        @error($name)
            <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $message }}</p>
        @enderror
    </span>

</div>
