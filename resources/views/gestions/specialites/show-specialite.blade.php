@extends('welcome')

@section('title', "pecialites")

@section('content')

<div class="p-4">
    <h1 class="mt-6 font-bold text-6xl uppercase mb-6">{{ $specialite->name }}</h1>
    <img src="{{ asset('storage/' . $specialite->image) }}" alt="{{ $specialite->name }}" class="w-full object-cover h-auto mb-4">
    
    <p class="mb-4">{{ $specialite->description }}</p>

    <ul class="mb-4 list-disc list-inside">
        <li><strong>Code :</strong> {{ $specialite->code }}</li>
        <li><strong>Filière :</strong> {{ $specialite->filiere->name ?? 'N/A' }}</li>
        <li><strong>Niveau :</strong> {{ $specialite->niveau }}</li>
        <li><strong>Créé par :</strong> {{ $specialite->user->name ?? 'N/A' }}</li>
        <li><strong>Date de création :</strong> {{ $specialite->created_at->format('d/m/Y') }}</li>
        <li><strong>Dernière mise à jour :</strong> {{ $specialite->updated_at->format('d/m/Y') }}</li>
    </ul>
</div>

@endsection