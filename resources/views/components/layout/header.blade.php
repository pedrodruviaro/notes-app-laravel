<header class="shadow-sm py-3 bg-white">
    <div class="max-w-4xl mx-auto px-3 flex items-center gap-2 justify-between flex-wrap">
        <a href="/">
            <span class="font-mono text-xl">NotesApp</span>
        </a>

        <nav class="flex items-center gap-4">
            <a href="/create">Create</a>

            <form action="/">
                @csrf
                <button type="submit" class="px-4 py-1.5 bg-blue-500 text-white rounded-lg">Logout</button>
            </form>
        </nav>
    </div>
</header>
