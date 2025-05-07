<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('assets/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/slick/slick-theme.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white shadow sticky top-0 z-50">
                <div class="flex justify-between items-center gap-2 p-4 sm:px-8">
                    <div>
                        <x-application-logo />
                    </div>
                    <div class="items-center gap-4 hidden sm:flex">
                        @foreach ($mainMenu->items as $item)
                            <a href="{{ $item['link'] }}" class="text-gray-900 hover:text-gray-500">{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="hidden sm:flex items-center gap-4">
                            <form action="/search" method="get" class="relative">
                                <x-icon-search class="absolute left-4 top-1/2 -translate-y-1/2 stroke-gray-900 w-4 h-4" />
                                <input size="35" aria-label="Enter search terms" type="text" class="w-[170px] h-[35px] rounded-full border-none bg-gray-100 pl-12 outline-none focus:border-none focus:ring-0" name="q" value="" autocomplete="off" autocapitalize="off" spellcheck="false">
                            </form>
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="{{ route('login') }}">
                                <x-icon-user class="w-6 h-6 fill-none stroke-gray-900 hover:stroke-gray-500" />
                            </a>
                            <x-cart />
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('layouts.footer')
        </div>
        <script src="{{ asset('assets/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/slick/slick.js') }}"></script>
        @stack('custom-scripts')
    </body>
</html>
