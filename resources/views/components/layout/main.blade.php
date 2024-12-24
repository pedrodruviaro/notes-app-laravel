@props(['title'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Notes App</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-neutral-100">

    <x-layout.header />

    <main class="max-w-4xl mx-auto px-3 my-10 lg:my-12">
        {{ $slot }}
    </main>
</body>

</html>
