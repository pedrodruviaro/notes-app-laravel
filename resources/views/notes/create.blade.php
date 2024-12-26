<x-layout.main title="Create">
    <x-base.page-title>Crete new note</x-base.page-title>

    <x-forms.form action="/create" method="POST">
        <x-forms.input label="Title" name="title" placeholder="Goals for the day" />
        <x-forms.textarea label="Note" name="content" rows="8" />

        <div class="flex flex-wrap gap-4 justify-between items-center">
            <x-base.button variant="secondary" as="button" type="submit">
                Create note
            </x-base.button>

            <x-base.button variant="danger" href="/">
                Cancel
            </x-base.button>
        </div>
    </x-forms.form>
</x-layout.main>
