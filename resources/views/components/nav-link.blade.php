@props(['href', 'active' => false])

@php
    $classes = $active ? 'border-b border-neutral-700' : 'border-b border-transparent';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
