{{--<div class="form-group">--}}
{{--    <label for="{{ $name }}">{{ $label }}</label>--}}
{{--    <select name="{{ $name }}" id="{{ $name }}" class="form-control">--}}
{{--        @foreach($options as $value => $text)--}}
{{--            <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>{{ $text }}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--</div>--}}


<label for="{{ $id }}" class="form-label">{{ $label }} @if ($required)
        *
    @endif
</label>
<div class="input-group">
    <select id="{{ $id }}" name="{{ $name }}@if ($isMultiSelect)[]@endif"
            @if ($disabled) disabled @endif
            class="form-control select2 {{ $class }} @if ($isMultiSelect) select2-multiple @endif
    @error($name) is-invalid @enderror"
            @if ($isMultiSelect) multiple="multiple" @endif data-toggle="select2"
            @if ($required) required @endif>
        @if ($isMultiSelect == false)
            <option value="">Selecione</option>
        @endif

        @foreach ($dataset as $data)
            @if ($isMultiSelect)
                <option value="{{ $data->value() }}" @if (
                    ($selected and is_array($selected))
                        ? in_array($data->value(), $selected)
                        : collect(old($id))->contains($data->value())) selected @endif>
                    {{ $data->label() }}
                </option>
            @else
                <option value="{{ $data->value() }}" @if ($data->value() == old($name) or $data->value() == $selected) selected @endif>
                    {{ $data->label() }}
                </option>
            @endif
        @endforeach
    </select>
    @if (!$errors->any())
        <div class="invalid-feedback">
            Campo Obrigatório.
        </div>
    @endif
    <div class="invalid-feedback">
        @error($name)
        {{ $message }}
        @enderror
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#{{ $id }}').each(function() {
            $(this).select2({
                dropdownParent: $(this).parent()
            });
        });
    });
</script>
