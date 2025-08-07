@extends('welcome')

@section('title', 'inscription')

@section('content')

<!-- Phase 1 -->

    <form action="{{ route('civilstatut.store')}}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto transition-colors duration-300" id="civilstatutForm">

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
         <div class="steps-wrapper mb-6">
            <div class="step" id="step1">
                <h2 class="text-2xl font-semibold mb-4">Phase 1 : ETAT CIVIL</h2>
                <div class="mb-4">
                    <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                    <input type="text" id="nom" name="nom" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                </div>
                <div class="mb-4">
                     <label for="prenom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prénom</label>
                     <input type="text" id="prenom" name="prenom" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                 </div>
                <div class="mb-4 flex w-full lg:flex-row gap-4">
                    <div>
                        <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date de Naissance</label>
                        <input type="date" id="date" name="date_naissance" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>
                    <div>
                        <label for="ville" class="block text-sm font-medium text-gray-700">Lieu de Naissance</label>
                        <input type="lieu" id="lieu" name="ville" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="departement" class="block text-sm font-medium text-gray-700">Departement</label>
                    <input type="departement" id="departement" name="Departement" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                </div>
                <div class="mb-4">
                    <label for="pays" class="block text-sm font-medium text-gray-700">Pays</label>
                    <input type="pays" id="pays" name="pays" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                </div>
                <div class="mb-4 ">
                <div class="flex w-full lg:flex-row gap-4">
                    <label for="sexe" class="block text-sm font-medium text-gray-700">Sexe :</label>
                    <div>
                        <input type="radio" id="masculin" name="sexe" value="M" class="mr-2" required>
                        <label for="homme" class="mr-4">Masculin</label>
                    </div>
                    <div>
                        <input type="radio" id="feminin" name="sexe" value="F" class="mr-2">
                        <label for="femme">Feminin</label>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="nationalite" class="block text-sm font-medium text-gray-700">Nationalite</label>
                <input type="text" id="nationalite" name="nationalite" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300">
            </div>
            <div class="mb-4">
                <div class="flex w-full lg:flex-row gap-4" required>
                    <label for="situation" class="block text-sm font-medium text-gray-700">Situation Familiale :</label>
                    <div>
                        <input type="radio" id="marie" name="situation_familiale" value="marié" class="mr-2">
                        <label for="marie" class="mr-4">Marie</label>
                    </div>
                    <div>
                        <input type="radio" id="celibataire" name="situation_familiale" value="celibataire" class="mr-2">
                        <label for="femme">Celibataire</label>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="flex w-full lg:flex-row gap-4" required>
                    <label for="sexe" class="block text-sm font-medium text-gray-700">Ete-vous en Situation Handicape ? :</label>
                <div>
                        <input type="radio" id="oui" name="handicape" value="1" class="mr-2" >
                        <label for="oui" class="mr-4">Oui</label>
                </div>
                    <div>
                        <input type="radio" id="non" name="handicape" value="0" class="mr-2">
                        <label for="femme">Non</label>
                    </div>
                </div>
            </div>
                    
                </div>
                <button type="submit" class="next-step w-full bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 text-white font-bold text-lg px-6 py-3 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:from-blue-600 hover:to-blue-700 dark:hover:from-blue-700 dark:hover:to-blue-800 hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Suivant</button>
            </div>
        </div>    
    </form>
    
    @vite('resources/js/app.js')

@endsection