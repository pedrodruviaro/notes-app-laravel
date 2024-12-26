<x-layout.main title="Edit">
    <x-base.page-title>Edit your note</x-base.page-title>

    <x-forms.form action="/edit/{{ $note->id }}" method="POST">
        @method('PATCH')

        <x-forms.input label="Title" name="title" placeholder="Goals for the day" value="{{ $note->title }}" />
        <x-forms.textarea label="Note" name="content" rows="8">{{ $note->content }}</x-forms.textarea>

        <div class="flex flex-wrap gap-4 justify-between items-center">
            <x-base.button variant="secondary" as="button" type="submit">
                Save note
            </x-base.button>

            <x-base.button variant="danger" href="/note/{{ $note->id }}">
                Cancel
            </x-base.button>
        </div>
    </x-forms.form>
</x-layout.main>
