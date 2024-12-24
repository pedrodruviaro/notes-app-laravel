<x-layout.main title="My Notes">
    <x-base.page-title>My Notes</x-base.page-title>

    <div class="grid gap-4">
        <article class="p-4 lg:p-8 rounded-xl bg-white border">
            <h3 class="font-semibold text-lg lg:text-xl mb-2">First note</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit quo laborum accusantium deleniti sit
                eligendi voluptatum consequuntur! Quidem doloribus provident perspiciatis doloremque excepturi maiores.
                Laudantium, voluptatem deleniti? Odit, facere quasi?</p>
            <p class="text-sm text-black/60 my-4">Create At: xxxx-xx-xx</p>
            <div class="flex items-center gap-2 flex-wrap">
                <x-base.button variant="muted" href="/">View</x-base.button>
                <x-base.button variant="outline" href="/">Edit</x-base.button>
            </div>
        </article>
    </div>
</x-layout.main>
