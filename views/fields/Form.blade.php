<form {!! $buildAttributes($attributes) !!} enctype="multipart/form-data">
    @foreach($fields as $field)
        @include("panel::fields/{$field['type']}", $field)
    @endforeach
</form>
