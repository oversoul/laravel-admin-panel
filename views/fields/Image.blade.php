<div class="w-full mb-6">
    <label
        for="{{ $attributes['name'] }}"
        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
    >{{ $title }}</label>
    @if (!$multiple)
        <div x-data="{...fields.imageUpload, image: '{{ $attributes['value'] }}' }">
            <div x-show="image" class="relative">
                <img :src="image" class="w-40 h-40 rounded" alt="{{ $attributes['value'] }}"/>
                <button
                    @click.prevent="hideImage()"
                    class="bg-red-500 hover:bg-red-600 focus:shadow-outline focus:outline-none text-white font-bold px-2 rounded absolute top-0"
                >
                    &times;
                </button>
            </div>

            <div
                x-show="!image"
                @dragover.prevent
                @click="$refs.file.click()"
                x-on:drop.prevent="setupImage(event.dataTransfer)"
                class="flex h-40 w-40 p-2 relative rounded text-center items-center justify-center border-4 border-dashed"
            >
                <input
                    type="file"
                    x-ref="file"
                    class="hidden"
                    name="{{ $attributes['name'] }}"
                    @change="setupImage(event.target)"
                />
                <p class="mt-1 text-sm text-gray-600">Drop file here or click to upload</p>
            </div>
        </div>
    @else
        <div x-data='{ ...fields.imagesUpload, images: @json($attributes['value'] ?: []) }'>
            <div class="flex flex-wrap -mx-2">
                <template x-for="(image, index) in images" :key="index">
                    <div class="relative m-2">
                        <img :src="image" class="object-cover w-40 h-40 rounded" :alt="image"/>
                        <button
                            @click.prevent="hideImage(index)"
                            class="bg-red-500 hover:bg-red-600 focus:shadow-outline focus:outline-none text-white font-bold px-2 rounded absolute top-0"
                        >
                            &times;
                        </button>
                    </div>
                </template>
            </div>

            <div
                @dragover.prevent
                @click="$refs.file.click()"
                x-on:drop.prevent="setupImage(event.dataTransfer)"
                class="mt-2 flex justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-400 border-dashed rounded-md h-40"
            >
                <input
                    multiple
                    type="file"
                    x-ref="file"
                    class="hidden"
                    name="{{ $attributes['name'] }}[]"
                    @change="setupImage(event.target)"
                />

                <p class="mt-1 text-sm text-gray-600">Drop files here or click to upload</p>
            </div>
        </div>
    @endif
</div>
