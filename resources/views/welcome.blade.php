
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 flex flex-col min-h-screen font-sans">
    <header class="w-full text-gray-800 dark:text-gray-200 lg:max-w-7xl max-w-[335px] mx-auto px-4 py-3 shadow-sm border-b border-red-300 dark:border-red-700 flex items-center justify-between transition-all duration-300">
    @if (Route::has('login'))
        <nav class="w-full flex items-center gap-6">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-gradient-to-r from-red-400 to-blue-400 rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                </div>
                <span class="text-lg font-bold text-red-700 dark:text-white">L'Esca</span>
            </div>
            
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('Index') }}" class="nav-link text-green-700 dark:text-red-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">
                    <i class="fas fa-home mr-1"></i> Accueil
                </a>
                <a href="{{ route('Home') }}" class="nav-link text-green-700 dark:text-red-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">
                    <i class="fas fa-chart-line mr-1"></i> Home
                </a>
                <a href="{{ route('civilstatut.index') }}" class="nav-link text-red-700 dark:text-red-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">
                    <i class="fas fa-user-plus mr-1"></i> Pré-inscription
                </a>
                <a href="#" class="nav-link text-red-700 dark:text-red-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium">
                    <i class="fas fa-envelope mr-1"></i> Contact
                </a>
                
                @auth
                    @php
                        $user = Auth::user();
                    @endphp
                    @if($user->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-blue-600 dark:text-blue-400 font-medium flex items-center">
                            <i class="fas fa-tachometer-alt mr-1"></i> Dashboard Admin
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="nav-link text-blue-600 dark:text-blue-400 font-medium flex items-center">
                            <i class="fas fa-tachometer-alt mr-1"></i> Dashboard Utilisateur
                        </a>
                    @endif
                @endauth
            </div>
        </nav>

        <div class="flex items-center space-x-3">
            @auth
                <div class="relative group">
                    <button class="flex items-center space-x-2 text-green-700 dark:text-green-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        <div class="w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-xs ml-1 transition-transform group-hover:rotate-180"></i>
                    </button>
                    
                    <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-green-200 dark:border-green-700 py-2 hidden group-hover:block dropdown-menu">
                        @if($user->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-blue-600 dark:text-blue-400 font-medium flex items-center">
                            <i class="fas fa-tachometer-alt mr-1"></i> Dashboard Admin
                        </a>
                        @else
                        <a href="{{ route('dashboard') }}" class="nav-link text-blue-600 dark:text-blue-400 font-medium flex items-center">
                            <i class="fas fa-tachometer-alt mr-1"></i> Dashboard Utilisateur
                        </a>
                        @endif
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-green-700 dark:text-green-300 hover:bg-green-100 dark:hover:bg-green-700">
                            <i class="fas fa-user-circle mr-3 text-blue-600"></i> Profile
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-green-700 dark:text-green-300 hover:bg-green-100 dark:hover:bg-green-700">
                            <i class="fas fa-cog mr-3 text-blue-600"></i> Paramètres
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center px-4 py-2 text-sm text-red-600 hover:bg-green-100 dark:hover:bg-green-700">
                                <i class="fas fa-sign-out-alt mr-3"></i> Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex items-center space-x-2">
                    <a href="{{ route('login') }}" class="btn-hover text-green-700 dark:text-green-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors font-medium px-4 py-2 rounded-lg hover:bg-green-100 dark:hover:bg-green-800">
                        <i class="fas fa-sign-in-alt mr-2"></i> Connexion
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-hover bg-blue-600 text-white hover:bg-blue-700 transition-colors font-medium px-4 py-2 rounded-lg shadow-md hover:shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i> Inscription
                        </a>
                    @endif
                </div>
            @endauth
            
            <!-- Mobile menu button -->
            <button class="md:hidden text-green-700 dark:text-green-300 p-2 rounded-lg hover:bg-green-100 dark:hover:bg-green-800">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    @endif
</header>
        
    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="footer-gradient py-12 mt-auto">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="animate-fadeIn">
                <div class="flex items-center space-x-2 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-r from-primary-600 to-accent-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-red-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">L'Esca</h3>
                </div>
                <p class="text-white mb-6 leading-relaxed">
                    L'excellence académique au service de votre réussite professionnelle. 
                    Nous formons les leaders de demain depuis 2005.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-full flex items-center justify-center text-red-600 hover:text-red-700 transition-colors">
                        <i class="fab fa-facebook-f text-red-600"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-full flex items-center justify-center text-red-600 hover:text-red-700 transition-colors">
                        <i class="fab fa-twitter text-red-600"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-full flex items-center justify-center text-red-600 hover:text-red-700 transition-colors">
                        <i class="fab fa-instagram text-red-600"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-full flex items-center justify-center text-red-600 hover:text-red-700 transition-colors">
                        <i class="fab fa-linkedin-in text-red-600"></i>
                    </a>
                </div>
            </div>
            
            <div class="animate-fadeIn" style="animation-delay: 0.1s;">
                <h4 class="text-xl font-semibold text-white mb-6">Nos Programmes</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="text-white hover:text-red-600 footer-link transition-colors flex items-center">
                            <i class="fas fa-laptop mr-3 text-red-600"></i> Informatique
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-white hover:text-red-600 footer-link transition-colors flex items-center">
                            <i class="fas fa-chart-line mr-3 text-red-600"></i> Commerce & Management
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-white hover:text-red-600 footer-link transition-colors flex items-center">
                            <i class="fas fa-flask mr-3 text-red-600"></i> Sciences & Ingénierie
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-white hover:text-red-600 footer-link transition-colors flex items-center">
                            <i class="fas fa-user-md mr-3 text-red-600"></i> Santé & Médecine
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-white hover:text-red-600 footer-link transition-colors flex items-center">
                            <i class="fas fa-globe-americas mr-3 text-red-600"></i> International
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="animate-fadeIn" style="animation-delay: 0.2s;">
                <h4 class="text-xl font-semibold text-white mb-6">Contactez-nous</h4>
                <div class="space-y-4 text-white">
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-full flex items-center justify-center text-red-600 hover:text-red-700 transition-colors w-8 h-8 bg-bleu-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-map-marker-alt text-red-600 "></i>
                        </div>
                        <div>
                            <p class="font-medium">Adresse</p>
                            <p class="text-sm">123 Marche B de bafoussam apres CCA Bank</p>
                            <p class="text-sm">Ville, Pays, 12345</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-full flex items-center justify-center text-red-600 hover:text-red-700 transition-colors">
                            <i class="fas fa-phone-alt text-red-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Téléphone</p>
                            <p class="text-sm">+237600000000</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-full flex items-center justify-center text-red-600 hover:text-red-700 transition-colors">
                            <i class="fas fa-envelope text-red-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Email</p>
                            <p class="text-sm">info@EcoleSuperieurLaCanadienne</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-full flex items-center justify-center text-red-600 hover:text-red-700 transition-colors">
                            <i class="fas fa-clock text-red-600"></i>
                        </div>
                        <div>
                            <p class="font-medium">Horaires</p>
                            <p class="text-sm">Lun-Ven: 8h-17h</p>
                            <p class="text-sm">Sam: 9h-13h</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-12 pt-8 text-center">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-white text-sm mb-4 md:mb-0">
                    &copy; 2024 École Supérieure La Canadienne. Tous droits réservés.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-white hover:text-red-600 text-sm transition-colors">Confidentialité</a>
                    <a href="#" class="text-white hover:text-red-600 text-sm transition-colors">Conditions d'utilisation</a>
                    <a href="#" class="text-white hover:text-red-600 text-sm transition-colors">Accessibilité</a>
                </div>
            </div>
        </div>
    </div>
</footer>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('button.md\\:hidden');
            const nav = document.querySelector('nav');
            
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function() {
                    const menu = document.createElement('div');
                    menu.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 mobile-menu';
                    menu.innerHTML = `
                        <div class="bg-white dark:bg-gray-800 h-full w-80 p-6 shadow-lg">
                            <div class="flex justify-between items-center mb-8">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-r from-primary-600 to-accent-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">La Canadienne</span>
                                </div>
                                <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                            <nav class="space-y-4">
                                <a href="{{ route('Index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-home mr-3"></i> Accueil
                                </a>
                                <a href="{{ route('Home') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-chart-line mr-3"></i> Home
                                </a>
                                <a href="{{ route('civilstatut.index') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-user-plus mr-3"></i> Pré-inscription
                                </a>
                                <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-envelope mr-3"></i> Contact
                                </a>
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-primary-600 dark:text-primary-400">
                                        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                                    </a>
                                @endauth
                            </nav>
                            <div class="absolute bottom-6 left-6 right-6">
                                @auth
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg font-medium transition-colors">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                                        </button>
                                    </form>
                                @else
                                    <div class="space-y-3">
                                        <a href="{{ route('login') }}" class="block text-center bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white py-3 rounded-lg font-medium transition-colors">
                                            <i class="fas fa-sign-in-alt mr-2"></i> Connexion
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="block text-center bg-primary-600 hover:bg-primary-700 text-white py-3 rounded-lg font-medium transition-colors">
                                                <i class="fas fa-user-plus mr-2"></i> Inscription
                                            </a>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                        </div>
                    `;
                    
                    document.body.appendChild(menu);
                    
                    menu.querySelector('button').addEventListener('click', function() {
                        document.body.removeChild(menu);
                    });
                    
                    menu.addEventListener('click', function(e) {
                        if (e.target === menu) {
                            document.body.removeChild(menu);
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>
