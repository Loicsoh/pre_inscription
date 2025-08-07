@extends('welcome')

@section('title', 'inscription')

@section('content')

<!-- Phase 3 -->
<form action="{{route('finance.store')}}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto transition-colors duration-300" id="preinscriptionForm">
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
    <div class="step hidden" id="step3">
        <h2 class="text-2xl font-semibold mb-4">Phase 3 : Financement de la formation</h2>
        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
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
        </div>
        <button type="button" class="prev-step bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-2">Précédent</button>
        <button type="submit" class="next-step bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Suivant</button>
    </div>
</form>

@vite('resources/js/app.js')

@endsection