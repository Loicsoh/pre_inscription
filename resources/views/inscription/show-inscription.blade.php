@extends('welcome') 

@section('title', 'Inscription')

 @section('content')

<div class="max-w-5xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg px-6 py-8 mb-6">

    <h1 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-8">
        📄 Votre Fiche d'Inscription
    </h1>

    <!-- Messages -->
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

    <!-- Formulaire pour permettre la modification -->
    <form action="{{ route('inscription.store') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Phase 1 : État civil -->
        <section class="mb-10 border-b border-gray-200 dark:border-gray-700 pb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">👤 Phase 1 : État Civil</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <strong>Nom :</strong>
                    <input type="text" name="nom" value="{{ $civilstatut->nom }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Prénom :</strong>
                    <input type="text" name="prenom" value="{{ $civilstatut->prenom }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Date de naissance :</strong>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($civilstatut->date_naissance)->format('d/m/Y') }}</span>
                </div>
                <div>
                    <strong>Lieu de naissance :</strong>
                    <input type="text" name="ville" value="{{ $civilstatut->ville }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Département :</strong>
                    <input type="text" name="departement" value="{{ $civilstatut->departement }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Pays :</strong>
                    <input type="text" name="pays" value="{{ $civilstatut->pays }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div class="flex items-center space-x-6">
                    <strong>Sexe :</strong>
                    <div class="flex items-center">
                        <input type="checkbox" name="sexe" value="M" @checked($civilstatut->sexe === 'M') disabled class="mr-1">
                        <label>Masculin</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="sexe" value="F" @checked($civilstatut->sexe === 'F') disabled class="mr-1">
                        <label>Féminin</label>
                    </div>
                </div>
                <div>
                    <strong>Nationalité :</strong>
                    <input type="text" name="nationalite" value="{{ $civilstatut->nationalite }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Situation familiale :</strong>
                    <input type="text" name="situation_familiale" value="{{ ucfirst($civilstatut->situation_familiale) }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div class="flex items-center space-x-6">
                    <strong>Handicapé(e) :</strong>
                    <div class="flex items-center">
                        <input type="checkbox" name="handicape" @checked($civilstatut->handicape == 1) disabled class="mr-1">
                        <label>Oui</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="handicape" @checked($civilstatut->handicape == 0) disabled class="mr-1">
                        <label>Non</label>
                    </div>
                </div>
            </div>
        </section>

        <!-- Phase 2 : Niveau Scolaire -->
        <section class="mb-10 border-b border-gray-200 dark:border-gray-700 pb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">🎓 Phase 2 : Niveau Scolaire</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <strong>Dernier diplôme obtenu :</strong>
                    <input type="text" name="serie" value="{{ $level->serie }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Année d'obtention :</strong>
                    <span class="font-medium">{{ \Carbon\Carbon::parse($level->obtention)->format('Y') }}</span>
                </div>
                <div>
                    <strong>Mention :</strong>
                    <input type="text" name="mention" value="{{ ucfirst($level->mention) }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Établissement :</strong>
                    <input type="text" name="etablissement" value="{{ $level->etablissement }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Spécialité choisie :</strong>
                    <input type="text" name="chxspecialite" value="{{ $level->chxspecialite ?? $level->specialite }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Fonction actuelle :</strong>
                    <input type="text" name="fonction" value="{{ $level->fonction }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Type d'hébergement :</strong>
                    <input type="text" value="
                        @if($level->hebergement === 'parental') Parental
                        @elseif($level->hebergement === 'externale') Externe
                        @else Autre
                        @endif
                    " class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Quartier de résidence :</strong>
                    <input type="text" name="quartier" value="{{ $level->quartier }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
            </div>
        </section>

        <!-- Phase 3 : Financement -->
        <section class="mb-10 border-b border-gray-200 dark:border-gray-700 pb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">💰 Phase 3 : Financement</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <strong>Prise en charge :</strong>
                    <input type="text" name="financial_type" value="{{ ucfirst($financial->financial_type) }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Mode de paiement :</strong>
                    <input type="text" name="mode" value="{{ ucfirst($financial->mode) }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div class="flex items-center space-x-6">
                    <strong>Pensée à l'étude à l'étranger :</strong>
                    <div class="flex items-center">
                        <input type="checkbox" name="immigration" @checked($financial->immigration === 1) disabled class="mr-1">
                        <label>Oui</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="immigration" @checked($financial->immigration === 0) disabled class="mr-1">
                        <label>Non</label>
                    </div>
                </div>
            </div>
        </section>

        <!-- Phase 4 : Parcours scolaire -->
        <section class="mb-10 border-b border-gray-200 dark:border-gray-700 pb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Phase 4 : Cursus scolaire</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <strong>2023-2024 :</strong>
                    <input type="text" name="premiere" value="{{ $parcour->premiere }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>2022-2023 :</strong>
                    <input type="text" name="deuxieme" value="{{ $parcour->deuxieme }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>2021-2022 :</strong>
                    <input type="text" name="troisieme" value="{{ $parcour->troisieme }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>2020-2021 :</strong>
                    <input type="text" name="quatrieme" value="{{ $parcour->quatrieme }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
            </div>
        </section>

        <!-- Phase 5 : Urgence -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Phase 5 : Contact d'urgence</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <strong>Nom et prénom :</strong>
                    <input type="text" name="nom_urg" value="{{ $urgence->nom_urg }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
                <div>
                    <strong>Téléphone :</strong>
                    <input type="text" name="tel_urg" value="{{ $urgence->tel_urg }}" class="w-full border-b border-gray-300 bg-transparent text-gray-800 dark:text-white" readonly>
                </div>
            </div>
        </section>

        <!-- Boutons d'action -->
        <div class="flex flex-wrap justify-between gap-4 mt-8">
            <button type="button" 
                    class="prev-step bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition"
                    onclick="window.history.back()">
                Précédent
            </button>
            <a href="{{ route('inscription.edit', ['inscription' => $inscription->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition">
                ✏️ Modifier
            </a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md transition">
                ✅ Envoyer l'inscription
            </button>
            <button type="button" onclick="window.print()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md transition">
                🖨️ Imprimer
            </button>
        </div>
    </form>
</div>

<!-- Script pour activer la modification -->
<script>
function enableEditing() {
    const inputs = document.querySelectorAll('input[readonly]');
    inputs.forEach(input => {
        input.removeAttribute('readonly');
        input.classList.remove('bg-transparent');
        input.classList.add('bg-yellow-50', 'border', 'border-yellow-300');
    });
    const checkboxes = document.querySelectorAll('input[disabled]');
    checkboxes.forEach(cb => cb.removeAttribute('disabled'));
}
</script>

@vite('resources/js/app.js')

<!-- @endsection -->