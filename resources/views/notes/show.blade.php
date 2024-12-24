<x-layout.main title="XXXX">

    <x-base.page-title>XXXXXX</x-base.page-title>

    <div class="mt-2 mb-4">
        <p class="text-sm text-black/60">Create At: xxxx-xx-xx</p>
        <p class="text-sm text-black/60">Last Update At: xxxx-xx-xx</p>
    </div>

    <p>XXXXXX</p>

    <div class="flex items-center gap-2 flex-wrap mt-10">
        <x-base.button variant="muted" href="/">Edit</x-base.button>

        <form action="/" method="POST">
            @csrf
            @method('DELETE')
            <x-base.button variant="danger" as="button" type="submit">Delete</x-base.button>
        </form>
    </div>
</x-layout.main>
