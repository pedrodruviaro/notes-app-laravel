<x-layout.main title="My Notes">
    <x-base.page-title>My Notes</x-base.page-title>

    <div class="grid gap-4">
        @forelse ($notes as $note)
            <x-note.card :note="$note" />
        @empty
            <p>No notes to display</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $notes->links() }}
    </div>
</x-layout.main>
