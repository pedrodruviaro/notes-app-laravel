<x-layout.main title="Profile">
    <x-base.page-title>Your Profile</x-base.page-title>

    <p>{{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p>

    <form action="/destroy" method="POST" class="mt-10">
        @csrf
        @method('DELETE')
        <x-base.button variant="danger" as="button" type="submit">DELETE PROFILE</x-base.button>
    </form>

</x-layout.main>
