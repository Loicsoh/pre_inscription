<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen">
      <header class="w-full bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] lg:max-w-4xl max-w-[335px] text-sm mb-6 mx-auto px-4 py-3 shadow-sm border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
    @if (Route::has('login'))
        <nav class="flex items-center gap-4">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border border-[#19140035] hover:border-[#1915014a] text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal transition"
                >
                    Dashboard
                </a>
                <a href="{{ route('Index') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Accueil</a>
                <a href="{{ route('Home') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Home</a>
                <a href="{{ route('Inscrip') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Pré-inscription</a>
                <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Contact</a>
            @else

                <div>
                    <a href="{{ route('Index') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Accueil</a>
                    <a href="{{ route('Home') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Home</a>
                    <a href="{{ route('Inscrip') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Pré-inscription</a>
                    <a href="#" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Contact</a>
                </div>
                <div class="pl-[440px]">
                    <a
                     href="{{ route('login') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal transition"
                    >
                    Log in
                    </a>

                    @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border border-[#19140035] hover:border-[#1915014a] text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal transition"
                    >
                        Register
                    </a>
                </div>
                @endif
            @endauth
        </nav>
    @endif
</header>
        
        <div>
            @yield('content')
        </div>

       <footer class="bg-gray-800 text-white py-8 mt-auto">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h2 class="text-xl font-semibold mb-4">Nos Services</h2>
                <ul class="space-y-2">
                    <li>Inscription en ligne</li>
                    <li>Support technique</li>
                    <li>Accès aux ressources pédagogiques</li>
                    <li>Communauté d'apprentissage</li>
                </ul>
            </div>
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <h2 class="text-xl font-semibold mb-4">Contactez-nous</h2>
                <p class="text-gray-400 mb-2">Pour toute question ou assistance, veuillez nous contacter :</p>
                <address class="not-italic text-blue-300 leading-relaxed">
                    Ecole Superieur La Canadienne<br>
                    123 Rue de l'enseignement<br>
                    Ville, Pays<br>
                    Code Postal<br>
                </address>
            </div>
            <div class="w-full md:w-1/3 text-center md:text-right">
                <p class="text-sm text-gray-400">&copy; 2023 Ecole Superieur La Canadienne. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</footer>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
