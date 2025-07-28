@extends('welcome')

@section('title', "pecialites")

@section('content')

<div class="p-4">
    <h1 class="mt-6 font-bold text-6xl text-white uppercase mb-6">{{ $specialite->name }}</h1>
    <img src="{{ asset('storage/' . $specialite->image) }}" alt="{{ $specialite->name }}" class="w-full object-cover h-auto mb-4">
    <h2 class="text-white text-2xl font-bold">{{ $filiere->name }}</h2>
    <p class="mb-4 text-white">{{ $specialite->description }}</p>

    <ul class="mb-4 list-disc list-inside">
        <li class="text-white"><strong>Code :</strong> {{ $specialite->code }}</li>
        <li class="text-white"><strong>Filière :</strong> {{ $specialite->filiere->name ?? 'N/A' }}</li>
        <li class="text-white"><strong>Niveau :</strong> {{ $specialite->niveau }}</li>
        <li class="text-white"><strong>Créé par :</strong> {{ $specialite->user->name ?? 'N/A' }}</li>
        <li class="text-white"><strong>Date de création :</strong> {{ $specialite->created_at->format('d/m/Y') }}</li>
        <li class="text-white"><strong>Dernière mise à jour :</strong> {{ $specialite->updated_at->format('d/m/Y') }}</li>
    </ul>
</div>

@endsection