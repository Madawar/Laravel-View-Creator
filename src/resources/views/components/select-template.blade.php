@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.filter = function filter(search, options) {
                //alert(search);
                if (search == "") {
                    return options;
                }
                fuse = new Fuse(Object.values(options), {
                    keys: ['text']
                });
                searchOptions = JSON.parse(JSON.stringify(fuse.search(search)));
                ids = _.map(searchOptions, 'item.id');
                filtered = _.intersectionWith(options, ids, (o, id) => o.id === id)
                return filtered;
            }
            window.getCurrent = function filter(id, options) {
                //alert(search);
                object = _.find(options, {
                    'id': id
                });
                if (typeof object !== 'undefined') {
                    return object.text;
                }
                return '';

            }

        });
        document.addEventListener('alpine:init', () => {
            Alpine.data('combo', (opts, name) => ({
                options: opts,
                searchOptions: [],
                search: '',
                filtered: [],
                id: name,
                open: false,

                init() {
                    var ret = _.find(this.options, {
                        'id': this.id
                    });
                    if (typeof ret !== 'undefined') {
                        this.search = ret.text;
                    }
                    this.filtered = this.options;
                    this.$watch('options', value => this.filtered = this.options);
                    this.$watch('id', value => {
                        this.search = getCurrent(this.id, this.options)
                    })
                },
            }))
        })
    </script>
@endsection

@if ($isEntangle)
    <div x-data="combo(@entangle($entangleOptions),@entangle($name))">
    @else
        <div x-data="combo({{ Illuminate\Support\Js::from($options) }},@entangle($name))">
@endif


<label for="combobox" class="block text-sm font-medium text-gray-700">{{ $label }}</label>

<div class="relative mt-1">
    <input id="combobox" type="text" x-model="search" @click="open=true"
        @click.away="search=getCurrent(id,options),open=false"
        class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-12 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
        @keyup="filtered = filter(search,options)" role="combobox" aria-controls="options" aria-expanded="false">
    <input type="hidden" name="{{ $name }}" x-bind:value="id" />
    <button type="button" class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
        <!-- Heroicon name: solid/selector -->
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>
    @error($name)
        <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $message }}</p>
    @enderror
    <ul class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
        id="options" role="listbox" x-show="open" x-cloak>
        <!--
        Combobox option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

        Active: "text-white bg-indigo-600", Not Active: "text-gray-900"
          :class="id == option.id ? 'text-white bg-indigo-600' : 'text-gray-900'"
      -->
        <template x-for="option in filtered">
            <li @click="id = option.id;search=option.text;open=false"
                class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900 " id="option-0" role="option"
                tabindex="-1">
                <!-- Selected: "font-semibold" -->
                <span class="block truncate" x-text="option.text">Leslie Alexander</span>

                <!--
          Checkmark, only display for selected option.

          Active: "text-white", Not Active: "text-indigo-600"
        -->
                <template x-if="id == option.id">
                    <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
                        <!-- Heroicon name: solid/check -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
            </li>
        </template>
        </template>
        <!-- More items... -->
    </ul>
</div>
</div>
