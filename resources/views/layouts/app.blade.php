<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Oldschool Forum') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Inter">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" x-data="{ sidebarOpen: false }">
        <div class="min-h-screen" >
            @include('layouts.navigation')
            <div class="main-outlet-wrapper max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div :class="{'hidden': sidebarOpen, 'inline': ! sidebarOpen }" class="w-52 lg:w-56 fixed h-screen overflow-hidden">
                    @include('layouts.sidebar')
                </div>
                <!-- Page Content -->
                <main :class="{'ml-0 lg:ml-0': sidebarOpen, 'ml-52 lg:ml-56': ! sidebarOpen }" class="flex-grow flex-shrink ml-52 lg:ml-56 p-2 pl-8 border-l-2">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
