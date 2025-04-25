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
            <nav class="bg-white shadow sticky top-0 z-50">
                <div class="flex justify-between items-center p-4 sm:px-8">
                    <div>
                        <x-application-logo />
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-4">
                            @foreach ($mainMenu->items as $key => $item)
                                <a href="{{ $item }}" class="text-gray-900 hover:text-gray-500">{{ $key }}</a>
                            @endforeach
                        </div>
                        <div>
                            <form action="/search" method="get" class="relative">
                                <x-icon-search class="absolute left-4 top-1/2 -translate-y-1/2 stroke-gray-900 w-4 h-4" />
                                <input size="35" aria-label="Enter search terms" type="text" class="w-[170px] h-[35px] rounded-full border-none bg-gray-100 pl-12 outline-none focus:border-none focus:ring-0" name="q" value="" autocomplete="off" autocapitalize="off" spellcheck="false">
                            </form>
                        </div>
                        <div class="flex items-center gap-4">
                            <a href="#">
                                <x-icon-user class="stroke-gray-900 hover:stroke-gray-500" />
                            </a>
                            <a href="#" class="flex items-center gap-1 text-gray-900 hover:text-gray-500 group">
                                <x-icon-bag class="stroke-gray-900 group-hover:stroke-gray-500" /> (2)
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <div>
                <img src="{{ asset('images/bottom.jpg') }}" class="w-full h-full object-cover">
            </div>

            <footer class="px-8 py-12">
                <div class="grid grid-cols-2 gap-8">
                    {{-- First column --}}
                    <div>
                        <div class="text-lg font-bold">STAY CONNECTED</div>
                        <div class="mb-4">
                            <form action="/subscribe" method="get" class="relative">
                                <input type="text" class="w-full h-[35px] rounded-full border-none bg-white pl-4 outline-none focus:border-none focus:ring-0" placeholder="Enter your email">
                                <x-icon-arrow-long-right class="absolute right-4 top-1/2 -translate-y-1/2" />
                            </form>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col gap-4">
                                <div class="text-lg font-bold">{{ $footerMenu->name }}</div>
                                <div class="flex flex-col gap-4">
                                    @foreach ($footerMenu->items as $key => $item)
                                        <a href="{{ $item }}">{{ $key }}</a>
                                    @endforeach
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    {{-- Second column --}}
                    <div>
                        <div class="text-lg font-bold mb-4">Social</div>
                        <div class="flex items-center gap-6">
                            <a href="#">
                                <x-icon-instagram />
                            </a>
                            <a href="#">
                                <x-icon-facebook />
                            </a>
                            <a href="#">
                                <x-icon-twitter />
                            </a>
                            
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
