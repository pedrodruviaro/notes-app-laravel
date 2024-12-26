<x-layout.main title="Deleted Notes">
    <x-base.page-title>Archived Notes</x-base.page-title>

    <div class="grid gap-4">
        @forelse ($notes as $note)
            <x-note.card :note="$note" :isDeleted="true" />
        @empty
            <p>No notes to display</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $notes->links() }}
    </div>
</x-layout.main>
