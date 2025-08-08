@extends('welcome')

@section('title', 'inscription')

@section('content')

<div class="max-w-5xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg px-6 py-8 mb-6">

    <h1 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-8">
        📄 Récapitulatif de votre inscription
    </h1>

    <!-- Message de succès ou d'erreur -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow">
            {{ session('error') }}
        </div>
    @endif

    <!-- Phase 1 : État civil -->
    <section class="mb-10 border-b border-gray-200 dark:border-gray-700 pb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">👤 Phase 1 : État Civil</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div>
                <strong>Nom :</strong> <span class="font-medium">{{ $civilstatut->nom }}</span>
            </div>
            <div>
                <strong>Prénom :</strong> <span class="font-medium">{{ $civilstatut->prenom }}</span>
            </div>
            <div>
                <strong>Date de naissance :</strong> <span class="font-medium">{{ \Carbon\Carbon::parse($civilstatut->date_naissance)->format('d/m/Y') }}</span>
            </div>
            <div>
                <strong>Lieu de naissance :</strong> <span class="font-medium">{{ $civilstatut->ville }}</span>
            </div>
            <div>
                <strong>Département :</strong> <span class="font-medium">{{ $civilstatut->departement }}</span>
            </div>
            <div>
                <strong>Pays :</strong> <span class="font-medium">{{ $civilstatut->pays }}</span>
            </div>
            <div>
                <strong>Sexe :</strong> <span class="font-medium">{{ $civilstatut->sexe === 'M' ? 'Masculin' : 'Féminin' }}</span>
            </div>
            <div>
                <strong>Nationalité :</strong> <span class="font-medium">{{ $civilstatut->nationalite }}</span>
            </div>
            <div>
                <strong>Situation familiale :</strong> <span class="font-medium">{{ ucfirst($civilstatut->situation_familiale) }}</span>
            </div>
            <div>
                <strong>Handicapé(e) :</strong> 
                <span class="font-medium">{{ $civilstatut->handicape ? 'Oui' : 'Non' }}</span>
            </div>
        </div>
    </section>

    <!-- Phase 2 : Niveau Scolaire -->
    <section class="mb-10 border-b border-gray-200 dark:border-gray-700 pb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">🎓 Phase 2 : Niveau Scolaire</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div>
                <strong>Année d'obtention :</strong> <span class="font-medium">{{ \Carbon\Carbon::parse($level->obtention)->format('Y') }}</span>
            </div>
            <div>
                <strong>Série :</strong> <span class="font-medium">{{ $level->serie }}</span>
            </div>
            <div>
                <strong>Mention :</strong> <span class="font-medium">{{ ucfirst($level->mention) }}</span>
            </div>
            <div>
                <strong>Établissement :</strong> <span class="font-medium">{{ $level->etablissement }}</span>
            </div>
            <div>
                <strong>Spécialité choisie :</strong> <span class="font-medium">{{ $level->chxspecialite ?? $level->specialite }}</span>
            </div>
            <div>
                <strong>Fonction actuelle :</strong> <span class="font-medium">{{ $level->fonction }}</span>
            </div>
            <div>
                <strong>Type d'hébergement :</strong> <span class="font-medium">
                    @if($level->hebergement === 'parental') Parental
                    @elseif($level->hebergement === 'externale') Externe
                    @else Autre
                    @endif
                </span>
            </div>
            <div>
                <strong>Quartier de résidence :</strong> <span class="font-medium">{{ $level->quartier }}</span>
            </div>
        </div>
    </section>

    <!-- Phase 3 : Financement -->
    <section class="mb-10 border-b border-gray-200 dark:border-gray-700 pb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">💰 Phase 3 : Financement de la formation</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div>
                <strong>Prise en charge :</strong> <span class="font-medium">{{ ucfirst($financial->financial_type) }}</span>
            </div>
            <div>
                <strong>Mode de paiement :</strong> <span class="font-medium">{{ ucfirst($financial->mode) }}</span>
            </div>
            <div class="md:col-span-2">
                <strong>Pensée à l'étude à l'étranger :</strong> 
                <span class="font-medium">{{ $financial->immigration ? 'Oui' : 'Non' }}</span>
            </div>
        </div>
    </section>

    <!-- Phase 4 : Parcours scolaire -->
    <section class="mb-10 border-b border-gray-200 dark:border-gray-700 pb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">📚 Phase 4 : Cursus scolaire (4 dernières années)</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div>
                <strong>2023-2024 :</strong> <span class="font-medium">{{ $parcour->premiere }}</span>
            </div>
            <div>
                <strong>2022-2023 :</strong> <span class="font-medium">{{ $parcour->deuxieme }}</span>
            </div>
            <div>
                <strong>2021-2022 :</strong> <span class="font-medium">{{ $parcour->troisieme }}</span>
            </div>
            <div>
                <strong>2020-2021 :</strong> <span class="font-medium">{{ $parcour->quatrieme }}</span>
            </div>
        </div>
    </section>

    <!-- Phase 5 : Urgence -->
    <section class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">📞 Phase 5 : Contact d'urgence</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div>
                <strong>Nom et prénom :</strong> <span class="font-medium">{{ $urgence->nom_urg }}</span>
            </div>
            <div>
                <strong>Téléphone :</strong> <span class="font-medium">{{ $urgence->tel_urg }}</span>
            </div>
        </div>
    </section>

    <!-- Boutons -->
    <div class="flex justify-between mt-8">
        <a href="" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md transition">
            Retour
        </a>
        <a href="" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition">
            Modifier
        </a>
        <button type="button" onclick="window.print()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md transition">
            Imprimer
        </button>
    </div>

</div>

@vite('resources/js/app.js')

@endsection