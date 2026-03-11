<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AfricaMarket') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <style>
            /* Auth page overrides – ensure our design system fonts apply */
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
    </head>
    <body style="background: var(--color-bg, #F5F0EB); min-height:100vh; display:flex; align-items:center; justify-content:center; padding: 24px 16px;">
        <div style="width:100%; max-width:480px;">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
