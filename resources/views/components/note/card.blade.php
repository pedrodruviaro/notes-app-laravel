@props(['note'])

<article class="p-4 lg:p-8 rounded-xl bg-white border">
    <h3 class="font-semibold text-lg lg:text-xl mb-2">{{ $note->title }}</h3>

    <p>{{ $note->content }}</p>

    <p class="text-sm text-black/60 my-4">Create At: {{ date('d/m/Y', strtotime($note->created_at)) }}</p>

    <div class="flex items-center gap-2 flex-wrap">
        <x-base.button variant="muted" href="/note/{{ $note->id }}">View</x-base.button>
        <x-base.button variant="outline" href="/edit/{{ $note->id }}">Edit</x-base.button>
    </div>
</article>
