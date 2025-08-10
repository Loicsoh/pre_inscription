@extends('welcome')

@section('title', 'admin')

@section('content')
<div class="flex h-screen bg-gray-100 dark:bg-gray-900">

    <!-- Sidebar -->
    <aside class="w-64 bg-white dark:bg-gray-800 shadow-lg">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-blue-600 dark:text-blue-400">User Panel</h1>
        </div>
        <nav class="mt-6">
            <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-200 bg-blue-50 dark:bg-gray-700 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Tableau de bord
            </a>
            <a href="{{ route('user.listfiliere') }}" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Filières
            </a>
            <a href="{{ route('user.listspecialite') }}" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Spécialités
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-8">
        <header class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-800 dark:text-white">Tableau de bord</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500 dark:text-gray-400">Bonjour, {{ auth()->user()->name }} 👋</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Déconnexion</button>
                </form>
            </div>
        </header>
    </main>
</div>
@endsection