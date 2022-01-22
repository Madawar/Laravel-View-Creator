<button @class([
    $class,
    'inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2' => !$icon,
    'inline-flex items-center p-1 border border-transparent rounded-full shadow-sm' => $icon,
    'text-white bg-indigo-600 hover:bg-indigo-700  focus:ring-indigo-500' =>
        $type == 'primary' ? true : false,
    'bg-white text-gray-700 hover:bg-gray-50  focus:ring-indigo-500' =>
        $type == 'neutral' ? true : false,
    'text-white bg-red-600 hover:bg-red-700  focus:ring-red-500' =>
        $type == 'danger' ? true : false,
    'text-white bg-purple-600 hover:bg-purple-700  focus:ring-purple-500' =>
        $type == 'info' ? true : false,
]) type="button" {{ $attributes->merge([]) }}>
    {{ $slot }}
    @if (!$icon)
        {{ $label }}
    @endif
</button>
