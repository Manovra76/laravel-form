@if($field->wrapper)
    <div class="{{ $field->getClass('wrapper') }}">
        @endif
        <button type="{{ $field->type }}" class="{{ $field->getClass('button-'.$field->type) }}">{{ $field->text }}</button>
        @if($field->wrapper)
    </div>
@endif
