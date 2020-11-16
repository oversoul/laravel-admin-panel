<div class="w-full mb-6 relative">
    <label
        for="{{ $attributes['id'] }}"
        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
    >{{ $title }}</label>

    @if (!$multiple)
        <select
            class="block appearance-none w-full border text-gray-500 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            {{ $buildAttributes($attributes) }}
        >
            @include('panel::fields/options', compact('options'))
        </select>
    @else
        <div
            x-init="filterTags"
            x-data='{ ...fields.multiSelect, tags: @json($value ?? []), choices: @json($options ?? []) }'
        >
            <template x-for="tag in tags">
                <input type="hidden" name="{{ $attributes['name'] }}[]" :value="tag">
            </template>

            <div class="flex flex-wrap border border-gray-200 py-2 px-2 rounded">
                <template x-for="(tag, i) in tags" :key="tag">
                <span class="inline-flex items-center text-sm bg-blue-200 p-1 mr-2 rounded text-blue-900">
                    <span x-text="tag"></span>
                    <button
                        class="text-blue-500 leading-none text-lg ml-2"
                        @click.prevent="removeTag(i)"
                    >&times;</button>
                </span>
                </template>

                <input
                    @focus="displayOptions()"
                    @keydown.backspace="popTag(event)"
                    @keydown.enter.prevent="addTag(event)"
                    @click.prevent.away="showOptions = false"
                    placeholder="Add {{ $attributes['placeholder'] }}"
                    class="inline-flex items-center text-sm p-1 mr-2"
                >
            </div>
            <div x-show="showOptions" class="border absolute left-0 right-0 rounded mt-1 bg-white py-1 shadow">
                <template x-for="choice in availableTags">
                    <p x-text="choice" @click="addTag(choice)" class="p-2 hover:bg-gray-400"></p>
                </template>
            </div>
        </div>
    @endif
</div>
