<x-layout.main title="Register">
    <article class="p-4 bg-white border rounded-xl lg:p-8 max-w-lg mx-auto">
        <x-base.page-title>Register</x-base.page-title>

        <form action="/register" method="POST" class="space-y-4">
            @csrf

            <label class="grid gap-1 font-semibold">
                Name
                <input class="px-4 py-2 border rounded-md font-normal" placeholder="John Doe" name="email"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </label>

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

            <label class="grid gap-1 font-semibold">
                Password
                <input class="px-4 py-2 border rounded-md font-normal" type="password" placeholder="*******"
                    name="password_confirmation">
                @error('password_confirmation')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </label>


            <div class="flex items-center flex-wrap gap-2 justify-between">
                <x-base.button as="button" type="submit">
                    Register
                </x-base.button>

                <a href="/login" class="text-sm">Already have an account?</a>
            </div>
        </form>
    </article>
</x-layout.main>
