<x-layout.main title="Create">
    <x-base.page-title>Crete new note</x-base.page-title>

    <form action="/create" method="POST" class="space-y-4">
        @csrf

        <label class="grid gap-1 font-semibold">
            Title
            <input class="px-4 py-2 border rounded-md font-normal" placeholder="Goals for the day" name="title"
                value="{{ old('title') }}">
            @error('title')
                <p class="text-red-400">{{ $message }}</p>
            @enderror
        </label>

        <label class="grid gap-1 font-semibold">
            Note
            <textarea class="px-4 py-2 border rounded-md font-normal" name="content" rows="8">
                {{ old('content') }}
            </textarea>
            @error('content')
                <p class="text-red-400">{{ $message }}</p>
            @enderror
        </label>

        <div class="flex flex-wrap gap-4 justify-between items-center">
            <x-base.button variant="secondary" as="button" type="submit">
                Create note
            </x-base.button>

            <x-base.button variant="danger" href="/">
                Cancel
            </x-base.button>
        </div>
    </form>
</x-layout.main>
