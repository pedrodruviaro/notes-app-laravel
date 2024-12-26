<header class="shadow-sm py-3 bg-white">
    <div class="max-w-4xl mx-auto px-3 flex items-center gap-2 justify-between flex-wrap">
        <a href="/">
            <span class="font-mono text-xl">NotesApp</span>
        </a>

        <nav class="flex items-center gap-4">
            @auth
                <a href="/create">Create</a>
                <a href="/deleted">Archived</a>

                <form action="/logout" method="POST">
                    @csrf
                    <x-base.button as="button" type="submit">
                        Logout
                    </x-base.button>
                </form>
            @endauth

            @guest
                <a href="/login">Log In</a>
                <a href="/register">Register</a>
            @endguest
        </nav>
    </div>
</header>
