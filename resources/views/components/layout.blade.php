<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <x-navbar />

    <x-sidebar />

    <div class="p-8 sm:ml-64 mt-14">
        <h1
            class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-2xl lg:text-3xl dark:text-white">
            {{ $title ?? 'Dashboard' }}
        </h1>

        {{ $slot }}
    </div>

    {{-- <x-footer /> --}}

    @stack('scripts')

</body>

</html>
