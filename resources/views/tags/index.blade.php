<x-layout.main title="Tags">
    <x-base.page-title>My Tags</x-base.page-title>

    <x-forms.form action="{{ route('create_tag') }}" method="POST">
        <div class="flex items-center gap-2 w-full">
            <x-forms.input label="Name" name="name" autofocus />
            <x-forms.input label="Slug" name="slug" />
        </div>

        <x-base.button as="button" type="submit">
            Create tag
        </x-base.button>
    </x-forms.form>

    <ul class="mt-10 grid lg:grid-cols-3 gap-2">
        @foreach ($tags as $tag)
            <li>
                <a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a>
            </li>
        @endforeach
    </ul>

</x-layout.main>
