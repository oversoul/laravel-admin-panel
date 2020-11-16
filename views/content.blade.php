@foreach ($items as $item)
	@include("panel::fields/{$item['type']}", $item)
@endforeach