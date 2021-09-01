<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'cKlicky.com') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    
    <!-- Styles -->
    
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white-500 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-800 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'cKlicky.com') }} 
                    </a>
                </div>

                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">

                    {{-- <a class="no-underline hover:underline" href="/">cKlicky.com</a> --}}
                    <a class="no-underline hover:underline" href="/blog">About cKlicky.com</a>
                    <a class="no-underline hover:underline" href="/loyalties">Kupony</a>
                    <a class="no-underline hover:underline" href="/points">Punkty</a>
                    <a class="no-underline hover:underline" href="/venues">Miejsca</a>

                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a class="no-underline hover:underline" href="/myloyalties/{{ Auth::user()->id }}">Moje Kupony</a>
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>

            <div class="bottomNav fixed bottom-0 w-screen">
                <nav  class="md:hidden bottom-0 w-full bg-gray-700 text-xs">
                  <ul class="flex justify-around items-center text-white text-center opacity-75 text-lg font-bold">
                    <li class="p-4 hover:bg-gray-500" style="border:1px solid gray">
                      <a href="/loyalties">
                        <span>Kupony</span>
                        {{-- <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                          <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                        </svg> --}}
                       </a>
                    </li>
                    <li class="p-4 hover:bg-gray-500" style="border:1px solid gray">
                      <a href="/points">
                        <span>Punkty</span>
                        {{-- <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                          <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                        </svg> --}}
                      </a>
                    </li>
                    <li class="p-4 hover:bg-gray-500" style="border:1px solid gray">
                      <a href="/venues">
                        <span>Miejsca</span>
                        {{-- <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                          <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                        </svg> --}}
                      </a>
                    </li>
                    <li class="p-4 hover:bg-gray-500" style="border:1px solid gray">
                      <a href="/myloyalties">
                        <span>Profil</span>
                        {{-- <svg class="h-6 w-6 fill-current mx-auto" viewBox="0 0 20 20">
                          <path d="M14 8a4 4 0 1 0-8 0v7h8V8zM8.027 2.332A6.003 6.003 0 0 0 4 8v6l-3 2v1h18v-1l-3-2V8a6.003 6.003 0 0 0-4.027-5.668 2 2 0 1 0-3.945 0zM12 18a2 2 0 1 1-4 0h4z" fill-rule="evenodd" />
                        </svg> --}}
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
        </header>

        <div>
            @yield('content')
        </div>
        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
