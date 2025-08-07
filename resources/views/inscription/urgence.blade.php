@extends('welcome')

@section('title', 'Inscription')

@section('content')

 <!-- phase 5 -->
    <form action="{{route('urgence.store')}}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto transition-colors duration-300" id="preinscriptionForm">
        @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" role="alert">
            <p>{{ session('success') }}</p>
            </div>
            @endif
            
            @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow" role="alert">
                <p>{{ session('error') }}</p>
        </div>
            @endif
        @csrf
            <div class="step hidden" id="step5">
                <h2 class="text-2xl font-semibold mb-4">phase 5: Adresse a Contacter en Cas d'Urgence</h2>
                <div class="mb-4">
                    <div>
                        <label for="nom_urg" class="block text-sm font-medium text-gray-700">Nom et Prenom</label>
                        <input type="text" id="nom_urg" name="nom_urg" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="tel_urg" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="text" id="tel_urg" name="tel_urg" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                    <button type="button" class="prev-step bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-2">Précédent</button>
                    <button type="submit" class="next-step bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Suivant</button>
            </div>
    </form>            

            @vite('resources/js/app.js')

@endsection