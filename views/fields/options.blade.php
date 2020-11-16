@foreach($options as $option)
<option value="{{ $option['value'] }}"{{ $option['selected'] ? ' selected' : '' }}>
    {{ $option['text'] }}
</option>
@endforeach