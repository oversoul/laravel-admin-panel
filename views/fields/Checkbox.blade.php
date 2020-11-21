<div class="flex items-start mb-4">
    <div class="flex items-center h-5">
        <input
            id="{{ $attributes['id'] }}"
            class="-mt-1 bg-white h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
            {!! $buildAttributes($attributes) !!}
        >
    </div>
    <div class="ml-3 text-sm leading-5">
       <label for="{{ $attributes['id'] }}" class="font-medium text-gray-700">{{ $title }}</label>
        <p class="text-gray-500">{{ $help }}</p>
    </div>
</div>
