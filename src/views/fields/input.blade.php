@if($field->wrapper)
    <div class="{{ $field->getClass('wrapper') }}">
        @endif
        @if($field->label)
            <label for="{{ $field->name }}">{{ $field->label }}</label>
        @endif
        <input type="{{ $field->type }}" class="{{ $field->getClass('input') }} {{ $errors->has($field->name) ? $field->getClass('invalid-input') : '' }}"
               name="{{ $field->name }}" id="{{ $field->name }}"
               value="{{ $field->value }}" {!! $field->options ? 'list="data-' . $field->name . '"' : '' !!}
                {!! $field->getAttributes() !!}>
        @if($errors->has($field->name))
            <div class="{{ $field->getClass('invalid-feedback') }}">
                {{ $errors->first($field->name) }}
            </div>
        @endif
        @if($field->wrapper)
    </div>
@endif
@if($field->options)
    <datalist id="data-{{ $field->name }}">
        @foreach($field->options as $option)
            <option value="{{ $option }}"/>
        @endforeach
    </datalist>
@endif
