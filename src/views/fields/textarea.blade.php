@if($field->wrapper)
    <div class="{{ $field->getClass('wrapper') }}">
        @endif
        @if($field->label)
            <label for="{{ $field->name }}">{{ $field->label }}</label>
        @endif
        <textarea class="{{ $field->getClass('input') }} {{ $errors->has($field->name) ? $field->getClass('invalid-input') : '' }}"
                  name="{{ $field->name }}" id="{{ $field->name }}"
                  {!! $field->getAttributes() !!}>{{ $field->value }}</textarea>
        @if($errors->has($field->name))
            <div class="{{ $field->getClass('invalid-feedback') }}">
                {{ $errors->first($field->name) }}
            </div>
        @endif
        @if($field->wrapper)
    </div>
@endif
