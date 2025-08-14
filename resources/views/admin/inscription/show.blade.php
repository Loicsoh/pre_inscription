<div class="mt-6 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
    <h3 class="text-lg font-semibold">Statut : 
        <span class="px-3 py-1 rounded-full 
            @if($user->statut == 'en attente') bg-yellow-200 text-yellow-800
            @elseif($user->statut == 'validé') bg-blue-200 text-blue-800
            @else bg-green-200 text-green-800 @endif">
            {{ ucfirst($user->statut) }}
        </span>
    </h3>

    @if($user->statut == 'en attente')
        <form action="{{ route('admin.inscription.valider', $user) }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                ✅ Valider & Demander Paiement
            </button>
        </form>
    @elseif($user->statut == 'validé')
        <form action="{{ route('admin.inscription.payer', $user) }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                💰 Marquer comme payé
            </button>
        </form>
    @else
        <p class="text-green-600 font-medium">✅ Inscription complète</p>
    @endif
</div>