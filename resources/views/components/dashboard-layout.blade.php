<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index, follow">
        <meta name="keywords" content="white label loyalty app development, custom braded without app solution ">

        <title>White label loyalty app</title>
        <meta name="description" content="White label loyalty app development. Loyalty and advertising solutions without mobile app. ">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

         <!-- Favicon -->
         {{-- <link rel="shortcut icon" href="{{ asset('storage/logo/favicon.ico') }}"> --}}
         
         <link rel="icon" type="image/png" href="{{ asset('storage/logo/logo_small_icon_only_inverted.png') }}">


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-5H7L25KPYM"></script>
    
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-5H7L25KPYM');
        </script>

        @livewireStyles
        

        <!-- Scripts -->
        @wireUiScripts
        {{-- <script src="alpine.js"></script> --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
        
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-white">
            @livewire('navigation-menu')
            @livewire('bottom-bar-navigation')
           
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-200">
                    @livewire('side-bar-navigation')   
                        <div>
                            {{ $slot }}
                        </div>
                </div>
                <div>
                    @include('layouts.footer')
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts

    </body>
</html>
