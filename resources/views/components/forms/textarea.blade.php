@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'px-4 py-2 border rounded-md font-normal',
    ];
@endphp

<x-forms.label :label="$label">
    <textarea {{ $attributes($defaults) }}>{{ $slot }}</textarea>

    @error($name)
        <x-forms.error-message>{{ $message }}</x-forms.error-message>
    @enderror

</x-forms.label>
