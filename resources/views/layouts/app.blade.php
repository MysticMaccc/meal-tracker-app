<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Meal Tracking System</title>

        {{-- custom bootstrap template --}}
        @include('partials.head')
        {{-- custom bootstrap template end --}}

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <main>
            <!-- Navbar -->
            @include("partials/navbar")

            <!-- Page Content -->
            <!-- Content -->
            <section class="pb-lg-8 pt-lg-3 py-6">
                    {{$slot}}
            </section>
        </main>

        @include('partials.scripts')
        @stack('modals')
        @livewireScripts
    </body>
</html>
