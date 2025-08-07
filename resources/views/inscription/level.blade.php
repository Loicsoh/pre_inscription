@extends('welcome')

@section('title', 'inscription')

@section('content')

<!-- Phase 2 -->
<form action="{{ route('level.store') }}" method="POST" 
      class="bg-white dark:bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto transition-colors duration-300" 
      id="preinscriptionForm">

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

    <div class="step" id="step2">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Phase 2 : Niveau Scolaire ou Diplôme Équivalent</h2>

        <!-- Année d'obtention -->
        <div class="mb-4">
            <label for="obtention" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Année d'Obtention
            </label>
            <input type="date" 
                   id="obtention" 
                   name="obtention" 
                   required 
                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
            @error('obtention')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Série -->
        <div class="mb-4">
            <label for="serie" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Série
            </label>
            <input type="text" 
                   id="serie" 
                   name="serie" 
                   required 
                   placeholder="ex: S, L, ES, G2" 
                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
            @error('serie')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Mention -->
        <div class="mb-4">
            <label for="mention" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Mention
            </label>
            <select name="mention" 
                    id="mention" 
                    required 
                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                <option value="" disabled selected>Choisir une mention</option>
                <option value="passable">Passable</option>
                <option value="bien">Bien</option>
                <option value="assez">Assez Bien</option>
                <option value="excellent">Excellent</option>
            </select>
            @error('mention')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Établissement -->
        <div class="mb-4">
            <label for="etablissement" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Établissement d'Obtention
            </label>
            <input type="text" 
                   id="etablissement" 
                   name="etablissement" 
                   required 
                   placeholder="Nom de l'école ou lycée" 
                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
            @error('etablissement')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Spécialité (ID) -->
        <div class="mb-4">
            <label for="specialite_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Choix de la Spécialité
            </label>
            <select name="specialite_id" 
                    id="specialite_id" 
                    required 
                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                <option value="" disabled selected>Choisir une spécialité</option>
                @foreach ($specialites as $specialite)
                    <option value="{{ $specialite->id }}">{{ $specialite->name }}</option>
                @endforeach
            </select>
            @error('specialite_id')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Fonction -->
        <div class="mb-4">
            <label for="fonction" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Statut ou Fonction de l'Étudiant
            </label>
            <input type="text" 
                   id="fonction" 
                   name="fonction" 
                   required 
                   placeholder="ex: Étudiant, Employé, Stagiaire" 
                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
            @error('fonction')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Hébergement -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Type d'Hébergement
            </label>
            <div class="mt-1 space-y-2">
                <label class="inline-flex items-center">
                    <input type="radio" name="hebergement" value="parental" required class="form-radio text-blue-500">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Parental</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="radio" name="hebergement" value="externale" class="form-radio text-blue-500">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Externe</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="radio" name="hebergement" value="autre" class="form-radio text-blue-500">
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Autre</span>
                </label>
            </div>
            @error('hebergement')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Quartier -->
        <div class="mb-6">
            <label for="quartier" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Quartier de Résidence
            </label>
            <input type="text" 
                   id="quartier" 
                   name="quartier" 
                   required 
                   placeholder="Nom du quartier" 
                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
            @error('quartier')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Choix Spécialité (Texte libre) -->
        <div class="mb-4">
            <label for="chxspecialite" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Autre Spécialité (si non listée)
            </label>
            <input type="text"
                   id="chxspecialite"
                   name="chxspecialite"
                   placeholder="Spécialité libre (optionnel)"
                   class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
            @error('chxspecialite')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <!-- Boutons -->
        <div class="flex justify-between">
            <button type="button" 
                    class="prev-step bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition"
                    onclick="window.history.back()">
                Précédent
            </button>
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition">
                Enregistrer et Suivant
            </button>
        </div>
    </div>
</form>

@vite('resources/js/app.js')

@endsection