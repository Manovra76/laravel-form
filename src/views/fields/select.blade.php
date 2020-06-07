@if($field->wrapper)
    <div class="{{ $field->getClass('wrapper') }}">
        @endif
        @if($field->label)
            <label for="{{ $field->name }}">{{ $field->label }}</label>
        @endif
        <select class="{{ $field->getClass('input') }} {{ $errors->has($field->name) ? $field->getClass('invalid-input') : '' }}"
                name="{{ $field->name }}" id="{{ $field->name }}"
                {!! $field->getAttributes() !!}>
            @if($field->empty)
                <option value="">{{ $field->empty_value }}</option>
            @endif
            @foreach($field->options as $key => $option)
                <option value="{{ $key }}"{{ $key == $field->value ? ' selected' : '' }}>{{ $option }}</option>
            @endforeach
        </select>
        @if($errors->has($field->name))
            <div class="{{ $field->getClass('invalid-feedback') }}">
                {{ $errors->first($field->name) }}
            </div>
        @endif
        @if($field->wrapper)
    </div>
@endif
