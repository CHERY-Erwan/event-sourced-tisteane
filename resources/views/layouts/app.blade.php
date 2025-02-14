<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', __('pages/homepage.meta-title'))</title>
        <meta name="description" content="@yield('description', __('pages/homepage.meta-description'))">

        <link rel="stylesheet" href="https://use.typekit.net/qmr1oca.css">

        <style>
            [x-cloak] {
                display: none;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
        x-data="{ object: true }"
        x-init="function() { this.object = false }"
        x-cloak
        class="font-skolar antialiased bg-[#f6f1eb] min-h-screen p-4 max-w-screen-2xl mx-auto">
        <main>
            {{ $slot }}
        </main>
    </body>
</html>
