<div>
    <div wire:ignore>
        <select name="" id="select2" multiple wire:model="value">
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}" @if(!empty($value) && in_array($option['value'], $value)) selected @endif>{{ $option['label'] }}</option>
            @endforeach
        </select>
    </div>
</div>

@script
    <script data-navigat-once>
        $("#select2").select2({
            width: '100%',
            placeholder: "Select an option",
            allowClear: true,
            tags: $wire.isTag,
        }).on('change', function() {
            let data = $(this).val()
            $wire.set('value', data)
        });
    </script>
@endscript
