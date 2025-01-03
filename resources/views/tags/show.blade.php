<x-layout.main title="{{ $tag->name }}">
    <x-base.page-title>{{ $tag->name }}</x-base.page-title>

    <div class="space-y-10">
        @foreach ($notes as $note)
            <x-note.card :note="$note" />
        @endforeach
    </div>
</x-layout.main>
