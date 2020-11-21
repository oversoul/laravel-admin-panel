@if (is_scalar($value))
	{!! $value !!}
@elseif (is_array($value))
	@foreach ($value as $field)
        @if(is_scalar($field))
            {!! $field !!}
        @else
            @include("panel::fields/{$field['type']}", $field)
        @endif
	@endforeach
@endif
