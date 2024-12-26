@props(['label'])

<label class="grid gap-1 font-semibold">
    <span>{{ $label }}</span>

    {{ $slot }}
</label>
