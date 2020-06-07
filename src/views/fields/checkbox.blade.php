@if($field->wrapper)
    <div class="{{ $field->getClass('wrapper') }}">
        @endif
        <div class="{{ $field->getClass('checkbox-wrapper') }}">
            <input type="checkbox" class="{{ $field->getClass('control-input') }} {{ $errors->has($field->name) ? $field->getClass('invalid-input') : '' }}"
                   name="{{ $field->name }}" id="{{ $field->name }}" {!! $field->getAttributes() !!}>
            <label class="{{ $field->getClass('control-label') }}"
                   for="{{ $field->name }}">{{ $field->label }}</label>
            @if($errors->has($field->name))
                <div class="{{ $field->getClass('invalid-feedback') }}">
                    {{ $errors->first($field->name) }}
                </div>
            @endif
        </div>
        @if($field->wrapper)
    </div>
@endif
