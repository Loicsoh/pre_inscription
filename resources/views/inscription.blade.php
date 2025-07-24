@extends('welcome')

@section('title', 'Inscription')

@section('content')

<h1 class="text-blue-800">page de preinscription</h1>
<div class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <h1 class="text-4xl font-bold mb-4">Inscription</h1>
    <p class="text-lg text-gray-600">Veuillez remplir le formulaire ci-dessous pour vous pré-inscrire.</p>
    
    <form action="#" method="POST" class="mt-6 space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" id="name" name="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>
        
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">S'inscrire</button>
    </form>
</div>

@endsection