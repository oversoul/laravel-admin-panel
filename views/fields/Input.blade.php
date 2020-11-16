<div class="w-full mb-6">
    <label
        for="{{ $attributes['id'] }}"
        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
    >{{ $title }}</label>

    <input
        class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
        {!! $buildAttributes($attributes) !!}
    >

    <p class="text-gray-600 text-xs italic">{{ $help }}</p>
</div>