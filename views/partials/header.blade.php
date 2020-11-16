<div class="flex items-center justify-end">
	@foreach ($items as $item)
		@include('panel::fields/' . $item['type'], $item)
	@endforeach
</div>
