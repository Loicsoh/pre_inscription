@extends('welcome')

@section('title', 'filieres')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded p-6">
        <h1 class="text-3xl font-bold text-red-600 mb-6">Créer une Nouvelle Filière</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('filieres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">name</label>
                <input id="name" name="name" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('name') }}</input>
            </div>

            <div class="mb-4">
                <label for="code" class="block text-gray-700 font-semibold mb-2">code</label>
                <input id="code" name="code" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('code') }}</input>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">image</label>
                <input type="file" name="image" id="image" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <!-- <div class="mb-6">
                <label for="departement" class="block text-gray-700 font-semibold mb-2">Département <span class="text-red-600">*</span></label>
                <select id="departement" name="departement_id" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="">Choisir un département</option>
                        <option value="">
                        </option>
                </select>
            </div> -->

            <div class="flex justify-end">
                <a href="{{ route('filieres.index') }}" class="mr-4 px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">Annuler</a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">
                    Créer la Filière
                </button>
            </div>
        </form>
    </div>
</div>
@endsection