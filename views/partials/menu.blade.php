@foreach($items as $value => $url)
<a href="{{ $url }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300">
	{{ $value }}
</a>
@endforeach