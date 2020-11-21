<form {!! $buildAttributes($attributes) !!} enctype="multipart/form-data">
    @include("panel::fields/value", ['value' => $fields])
</form>
