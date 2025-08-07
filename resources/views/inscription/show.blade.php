@extends('welcome')

@section('title', 'inscription')

@section('content')

<form action="" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto transition-colors duration-300">
    @csrf
    <!-- phase 1 etat civil -->
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
                    </div>
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
                </div>
                <div>
                    <input type="radio" id="oui" name="handicape" value="1" class="mr-2" >
                    <label for="oui" class="mr-4">Oui</label>
                </div>
                <div>
                    <input type="radio" id="non" name="handicape" value="0" class="mr-2">
                    <label for="femme">Non</label>
                </div>
            </div>
            <div>
                <button type="submit" class="next-step w-full bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 text-white font-bold text-lg px-6 py-3 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:from-blue-600 hover:to-blue-700 dark:hover:from-blue-700 dark:hover:to-blue-800 hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Suivant</button>
            </div>
        </div>

        <!-- phase 2 financial -->
        <div class="step hidden" id="step3">
            <h2 class="text-2xl font-semibold mb-4">Phase 3 : Financement de la formation</h2>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <label class="font-semibold">Prise en charge :</label>
                <div class="flex flex-col gap-2 mt-2">
                    <label><input type="radio" name="financial_type" value="Vous" required> Par Vous</label>
                    <label><input type="radio" name="financial_type" value="Employeur"> Par votre Employeur</label>
                    <label><input type="radio" name="financial_type" value="Bailleur"> Par un bailleur de Fonds</label>
                    <label><input type="radio" name="financial_type" value="Autre"> Autre</label>
                </div>
            </div>
            <div>
                <label class="font-semibold">Mode de payement :</label>
                <div class="flex flex-col gap-2 mt-2">
                    <label><input type="radio" name="mode" value="Mandat" required> Par mandat</label>
                    <label><input type="radio" name="mode" value="Cheque"> Par Cheque</label>
                    <label><input type="radio" name="mode" value="Caisse"> Par Caisse</label>
                </div>
            </div>
            <div class="md:col-span-2">
                <label class="font-semibold">Avez-vous deja pense poursuivre vos etudes dans un pays etranger ? :</label>
                <div class="flex flex-col gap-2 mt-2">
                    <label><input type="radio" name="immigration" value="Oui" required> Oui</label>
                    <label><input type="radio" name="immigration" value="Non"> Non</label>
                </div>
            </div>
            <button type="button" class="prev-step bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-2">Précédent</button>
            <button type="submit" class="next-step bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Suivant</button>
        </div>

        <!-- phase 3 level -->
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

    <!-- phase 4 parcour -->

    <div class="step hidden" id="step4">
        <h2 class="text-2xl font-semibold mb-4">Phase 4 : Cursus scolaire des quatre dernières années</h2>
        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="font-semibold">2023-2024</label>
                <input type="text" name="premiere" value="" class="rounded-xl">
            </div>
            <div>
                <label class="font-semibold">2022-2023</label>
                <input type="text" name="deuxieme" value="" class="rounded-xl">
            </div>
            <div>
                <label class="font-semibold">2021-2022</label>
                <input type="text" name="troisieme" value="" class="rounded-xl">
            </div>
                <div>
                    <label >2020-2021</label>
                    <input type="text" name="quatrieme" value="" class="rounded-xl">
                </div>
                <button type="button" class="prev-step bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-2">Précédent</button>
                <button type="submit" class="next-step bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Suivant</button>
        </div>
    </div>

    <!-- phase 5 urgence -->

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

@endsection