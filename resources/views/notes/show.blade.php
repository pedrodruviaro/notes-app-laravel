<x-layout.main :title="$note->title">

    <x-base.page-title>
        {{ $note->title }}
    </x-base.page-title>

    <div class="mt-2 mb-4">
        <p class="text-sm text-black/60">Create At: {{ date('d/m/Y', strtotime($note->created_at)) }}</p>
        <p class="text-sm text-black/60">Last Update At: {{ date('d/m/Y', strtotime($note->updated_at)) }}</p>
    </div>

    <p>{{ $note->content }}</p>

    <div class="flex items-center gap-2 flex-wrap mt-10">
        <x-base.button variant="muted" href="/edit/{{ $note->id }}">Edit</x-base.button>

        <form action="/delete/{{ $note->id }}" method="POST">
            @csrf
            @method('DELETE')
            <x-base.button variant="danger" as="button" type="submit">Delete</x-base.button>
        </form>
    </div>
</x-layout.main>
