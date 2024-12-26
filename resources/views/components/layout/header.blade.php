<header class="shadow-sm py-3 bg-white">
    <div class="max-w-4xl mx-auto px-3 flex items-center gap-2 justify-between flex-wrap">
        <a href="/">
            <span class="font-mono text-xl">NotesApp</span>
        </a>


        {{ request()->routeIs('profile') }}

        <nav class="flex items-center gap-4">
            @auth
                <x-nav-link href="/profile" :active="request()->is('profile')">Profile</x-nav-link>
                <x-nav-link href="/create" :active="request()->is('create')">Create</x-nav-link>
                <x-nav-link href="/deleted" :active="request()->is('deleted')">Archived</x-nav-link>

                <form action="/logout" method="POST">
                    @csrf
                    <x-base.button as="button" type="submit">
                        Logout
                    </x-base.button>
                </form>
            @endauth

            @guest
                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
            @endguest
        </nav>
    </div>
</header>
