<div {!! $buildAttributes($attributes) !!}>
	@foreach($value as $item)
		@include('panel::fields/value', ['value' => $item])
	@endforeach
</div>