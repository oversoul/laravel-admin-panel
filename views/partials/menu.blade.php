@foreach($items as $value => $url)
    <a
        href="{{ $url }}"
        class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 {{ url()->current() === $url ? 'bg-gray-800' : '' }}"
    >{{ $value }}</a>
@endforeach
