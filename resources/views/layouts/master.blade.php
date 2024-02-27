<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ $pageDescription ?? "SpeakerNet is a public speaker-finder service, full of speakers willing to give free / paid talks to groups such as Rotary, Lions, WI and U3A" }}">
    <meta name="author" content="{{ $speakerName ?? 'Novate Ltd' }}">
    <link rel="icon" href="../../favicon.ico">
    <title>{{ $siteTitle ?? 'SpeakerNet' }}</title>

    <!-- OG: stuff -->
    <meta property="og:title" content="SpeakerNet"/>
    <meta property="og:image" content="{{ url("/images/ogcover.png") }}" />
    <meta property="og:description" content="SpeakerNet is a public speaker-finder service, full of speakers willing to give free or paid talks to groups such as Rotary, Lions, WI and U3A"/>
    <meta property="og:url" content="{{ url()->current() }}" />

    <!-- Tailwind CSS -->
    <link href="/css/tw3.css?{{ now()->timestamp }}" rel="stylesheet">

    <!--Font Awesome -->
    <link rel="stylesheet" href="/font-awesome-4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&family=Open+Sans:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Oswald&display=swap">

    {{-- <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> --}}

    {{-- css animations (for notify) --}}
    {{-- <link href="/components/animate.css/animate.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.5/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" /> --}}

    <!-- Alpine and Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/ui@3.12.0-beta.0/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
    <link rel="manifest" href="/fav/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    @yield('page-css')
  </head>

  <body class="w-auto bg-zinc-200">

    @if (Auth::check() && Auth::user()->is_admin)
        @include('layouts.admin')
    @endif

    <!-- Page Heading -->
    <header class="fixed top-0 z-40 w-full border border-gray-600 navbar border-b2"  x-data="{ open: false }" 
        style="background:linear-gradient(to bottom, #235a96 0%, hsl(212, 58%, 20%) 100%) repeat scroll 0 0 transparent;">
        <div class="flex items-center justify-between max-w-5xl px-4 pb-2 mx-auto">
          <a href="/">
            <div class="navbar-brand">Help</div>
          </a>

          <div class="text-right">
            
            <ul class="flex-row hidden space-x-3 lg:flex">
              
              <li class="text-sm font-bold text-[#7ea0bd] tracking-wide border-2 rounded-xl px-2 py-1 uppercase hover:bg-gray-200 hover:border-black hover:text-[#153150]">
                <button onclick="Livewire.dispatch('modal.open',{ component: 'site-search', arguments: {} })">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="inline w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                  </svg>    
                </button>
              </li>
         
            </ul>
          </div>
        </div>


    </header>
    <div class="mt-24"></div>
    

    <div class="w-full max-w-5xl mx-auto bg-white shadow-lg">

        @yield('content')

    </div> <!-- /container -->


    <footer class="max-w-5xl mx-auto text-sm font-normal">

    </footer>

    <livewire:modal />

    <!-- Bootstrap core JavaScript
    ================================================== -->
    {{-- Placed at the end of the document so the pages load faster --}}
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/bootstrap/js/vendor/jquery.min.js"><\/script>')</script>
    <!--before yield -->
        @yield('page-js')

  </body>
</html>
                

