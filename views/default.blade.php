<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function triggerDestroyForm(event, action) {
            const answer = confirm("This action cannot be reversed. are you sure?");
            if (!answer) {
                event.preventDefault();
                return;
            }

            const form = document.querySelector('#destroy_form');
            form.action = action;
            form.submit();
        }
    </script>
</head>

<body class="text-gray-700">
<nav class="bg-gray-700">
    <div class="container max-w-7xl mx-auto">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 text-white">
                    {{ config('app.name') }}
                </div>
                <div class="block">
                    <div class="ml-10 flex items-baseline">
                        @include('panel::partials/menu', ['items' => $data->get('menu')])
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="ml-3 relative">
                        {{-- <a href="javascript:{}" class="text-sm font-medium text-gray-300" onclick="triggerdestroyform(event, '<?=$config->logouturl();?>')">logout</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<header class="bg-white shadow flex justify-center">
    <div class="container">
        <div class="max-w-7xl mx-auto py-6">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-2xl font-bold leading-tight text-gray-700">
                        {{ $data->get('page.name') }}
                    </h2>
                    <h3 class="text-gray-600">
                        {{ $data->get('page.description') }}
                    </h3>
                </div>

                @include('panel::partials/header', ['items' => $data->get('header')])
            </div>
        </div>
    </div>
</header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-4 sm:px-0">
            <div class="h-96">
                <form method="POST" id="destroy_form">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                </form>
                <div class="flex justify-center">
                    <div class="container">
                        @include('panel::partials/errors', ['errors' => $data->get('errors')])
                        @include('panel::content', ['items' => $data->get('body')])
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.2/dist/alpine.js" defer></script>
<script>
    const csrf_token = '{{ csrf_token() }}';
    const uploadUrl = document.querySelector('#upload-url')

    const fields = {
        imageUpload: {
            image: null,
            hideImage() {
                this.image = ''
                this.$refs.file.value = null
            },
            setupImage(field) {
                const file = field.files[0]
                let reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onloadend = () => {
                    this.image = reader.result
                }
            }
        },

        imagesUpload: {
            images: [],
            hideImage(index) {
                const image = this.images[index]
                if (!uploadUrl) {
                    this.images.splice(index, 1)
                    return
                }

                const data = new FormData()
                data.append('_token', csrf_token)
                data.append('_method', 'DELETE')
                fetch('/admin/images/' + image.id, {
                    method: 'POST',
                    body: data
                }).then(response => {
                    if (response.status === 200) {
                        this.images.splice(index, 1)
                        return
                    }

                    alert(response.statusText)
                })
            },
            setupImage(field) {
                const files = Array.from(field.files)

                files.map(file => {
                    let reader = new FileReader()
                    reader.readAsDataURL(file)
                    let data = new FormData()
                    reader.onloadend = () => {
                        data.append('file', file)
                        data.append('_token', csrf_token)
                        if (!uploadUrl) {
                            this.images.push(reader.result)
                            return
                        }

                        fetch(uploadUrl.value, {
                            method: 'POST',
                            body: data
                        }).then(response => {
                            if (response.status === 200) {
                                return response.json()
                            }
                            alert(response.statusText)
                        }).then(response => {
                            this.images.push(response)
                        })
                    }

                })
            }
        },

        multiSelect: {
            tags: [],
            choices: [],
            availableTags: [],
            showOptions: false,

            init() {
                this.filterTags()
            },

            filterTags() {
                this.availableTags = []
                this.choices.map(tag => (!this.tags.includes(tag)) ? this.availableTags.push(tag) : null)
                this.showOptions = false
            },

            displayOptions() {
                if (this.availableTags.length !== 0) this.showOptions = true
            },

            addTag(event) {
                let tag = ''
                if (typeof (event) === "string") {
                    tag = event
                } else {
                    tag = event.target.value.trim()
                    event.target.value = ''
                }

                if (tag === '' || this.tags.includes(tag)) return
                this.tags.push(tag)
                this.filterTags()
            },

            popTag(event) {
                if (event.target.value.trim() !== '') return
                this.tags.pop()
            },

            removeTag(i) {
                this.tags.splice(i, 1)
                this.filterTags()
            }
        },
    }
</script>
</body>

</html>
