@props(['as' => 'a', 'variant' => 'primary'])

@php
    $variants = [
        'primary' =>
            'px-4 py-1.5 bg-blue-500 text-neutral-50 rounded-lg hover:opacity-90 focus:opacity-90 transition-all',
        'secondary' =>
            'px-4 py-1.5 bg-pink-500 text-neutral-50 rounded-lg hover:opacity-90 focus:opacity-90 transition-all',
        'danger' =>
            'px-4 py-1.5 bg-red-500 text-neutral-50 rounded-lg hover:opacity-90 focus:opacity-90 transition-all',
    ];
@endphp

@if ($as == 'a')
    <a {{ $attributes->merge(['class' => $variants[$variant]]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $variants[$variant]]) }}>
        {{ $slot }}
    </button>
@endif
