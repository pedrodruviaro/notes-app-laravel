<x-layout.main title="Register">
    <article class="p-4 bg-white border rounded-xl lg:p-8 max-w-lg mx-auto">
        <x-base.page-title>Register</x-base.page-title>

        <x-forms.form action="/register" method="POST">
            <x-forms.input label="Name" name="name" placeholder="John Doe" />
            <x-forms.input label="Email" name="email" type="email" placeholder="youremail@email.com" />
            <x-forms.input label="Password" name="password" type="password" placeholder="********" />
            <x-forms.input label="Password" name="password_confirmation" type="password"
                placeholder="Confirm your password" />

            <div class="flex items-center flex-wrap gap-2 justify-between">
                <x-base.button as="button" type="submit">
                    Register
                </x-base.button>

                <a href="/login" class="text-sm">Already have an account?</a>
            </div>
        </x-forms.form>
    </article>
</x-layout.main>
