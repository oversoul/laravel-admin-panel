<fieldset class="mb-6">
    <legend class="text-base leading-6 font-medium text-gray-900">{{ $title }}</legend>
    <p class="text-sm leading-5 text-gray-500">{{ $help }}</p>
    <div>
        @foreach($options as $option)
            <div class="mt-4 flex items-center">
                <input
                    type="radio"
                    value="{{ $option['value'] }}"
                    name="{{ $attributes['name'] }}"
                    {{ $option['selected'] ? 'selected' : '' }}
                    id="{{ $attributes['name'] . '_' . $option['id'] }}"
                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                >
                <label for="{{ $attributes['name'] . '_' . $option['id'] }}" class="ml-3">
                    <span class="block text-sm leading-5 font-medium text-gray-700">{{ $option['value'] }}</span>
                </label>
            </div>
        @endforeach
    </div>
</fieldset>