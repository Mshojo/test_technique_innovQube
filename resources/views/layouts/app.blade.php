<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <!-- Exemple dans une vue -->
<a href="#" class="bg-secondary hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
    Réserver
</a>
<div class="bg-white rounded-lg shadow-md p-6 mb-4">
    <h2 class="text-xl font-semibold text-gray-800">Nom du bien</h2>
    <p class="text-gray-600 mt-2">Description du bien...</p>
    <p class="text-gray-800 mt-2 font-bold">Prix / nuit : 120€</p>
    <a href="#" class="mt-4 inline-block bg-primary hover:bg-blue-800 text-white py-2 px-4 rounded">
        Réserver
    </a>
</div>

    </body>
</html>
