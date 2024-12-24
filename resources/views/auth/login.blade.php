<x-layout.main title="Login">
    <article class="p-4 bg-white border rounded-xl lg:p-8 max-w-lg mx-auto">
        <x-base.page-title>Log In</x-base.page-title>

        <form action="/login" method="POST" class="space-y-4">
            @csrf

            <label class="grid gap-1 font-semibold">
                Email
                <input class="px-4 py-2 border rounded-md font-normal" type="email" placeholder="johndoe@email.com"
                    name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </label>

            <label class="grid gap-1 font-semibold">
                Password
                <input class="px-4 py-2 border rounded-md font-normal" type="password" placeholder="*******"
                    name="password">
                @error('password')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </label>

            <div class="flex items-center flex-wrap gap-2 justify-between">
                <x-base.button variant="secondary" as="button" type="submit">
                    Log In
                </x-base.button>

                <a href="/register" class="text-sm">Don't have an account?</a>
            </div>
        </form>
    </article>
</x-layout.main>
