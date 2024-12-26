@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'value' => old($name),
        'class' => 'px-4 py-2 border rounded-md font-normal',
    ];
@endphp

<x-forms.label :label="$label">
    <input {{ $attributes($defaults) }}>

    @error($name)
        <x-forms.error-message>{{ $message }}</x-forms.error-message>
    @enderror

</x-forms.label>
