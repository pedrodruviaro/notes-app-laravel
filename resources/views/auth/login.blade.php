<x-layout.main title="Login">
    <article class="p-4 bg-white border rounded-xl lg:p-8 max-w-lg mx-auto">
        <x-base.page-title>Log In</x-base.page-title>

        <x-forms.form action="/login" method="POST">
            <x-forms.input label="Login" name="email" type="email" placeholder="youremail@email.com" />
            <x-forms.input label="Password" name="password" type="password" placeholder="********" />

            <div class="flex items-center flex-wrap gap-2 justify-between">
                <x-base.button variant="secondary" as="button" type="submit">
                    Log In
                </x-base.button>

                <a href="/register" class="text-sm">Don't have an account?</a>
            </div>
        </x-forms.form>
    </article>
</x-layout.main>
