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
    <body>

        <nav class="bg-gray-800 p-4 flex justify-between space-x-4">
            <div class="flex justify-beetweent space-x-4">
                <ul class="flex items-center gap-2">
                    <!-- <li><a href="{{route('home')}}" class="text-gray-300 hover:text-white">Accueil</a></li>
                    <li><a href="{{route('Inscrip')}}" class="text-gray-300 hover:text-white">Pré-inscription</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li> -->
                </ul>
            </div>

            <a href="#"><box-icon class="fill-white" type='solid' name='user-circle'></box-icon></a>
        </nav>
        
        <div>
            @yield('content')
        </div>

        <!-- <footer class="bottom-0 left-0 w-full bg-gray-800 text-white text-center p-8 flex flex-col md:flex-row justify-around items-start md:items-center space-y-6 md:space-y-0">
            <div class="md:w-1/3">
                <h2 class="text-2xl font-semibold mb-4">Nos Services</h2>
                <ul class="list-disc pl-5 space-y-2 text-left">
                    <li>Inscription en ligne</li>
                    <li>Support technique</li>
                    <li>Accès aux ressources pédagogiques</li>
                    <li>Communauté d'apprentissage</li>
                </ul>
            </div>
            <div class="md:w-1/3">
                <h2 class="text-2xl font-semibold mb-4">Contactez-nous</h2>
                <p class="text-gray-400 mb-2">Pour toute question ou assistance, veuillez nous contacter à l'adresse suivante :</p>
                <address class="not-italic text-blue-400 leading-relaxed">
                    Ecole superieur la canadienne<br>
                    123 Rue de l'enseignement<br>
                    Ville, Pays<br>
                    Code Postal<br>
                </address>
            </div>
            <div class="md:w-1/3 flex items-center justify-center md:justify-end text-sm text-gray-400">
                <p>&copy; 2023 Ecole Superieur La Canadienne. All rights reserved.</p>
            </div>
        </footer> -->
    </body>
</html>
