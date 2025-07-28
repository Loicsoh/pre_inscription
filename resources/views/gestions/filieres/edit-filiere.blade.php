@extends('welcome')

@section('title', 'filiere')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded p-6">
        <h1 class="text-3xl font-bold text-red-600 mb-6">Modifier la Filière</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('filieres.update', $filiere->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nom</label>
                <input id="name" name="name" type="text" value="{{ old('name', $filiere->name) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" required>
            </div>

            <div class="mb-4">
                <label for="code" class="block text-gray-700 font-semibold mb-2">Code</label>
                <input id="code" name="code" type="text" value="{{ old('code', $filiere->code) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('description', $filiere->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                <input type="file" name="image" id="image"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                @if($filiere->image)
                    <img src="{{ asset('storage/' . $filiere->image) }}" alt="Image de la filière" class="mt-2 max-h-40">
                @endif
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('filieres.index') }}" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">Annuler</a>
                <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-800">Modifier</button>
            </div>
        </form>
    </div>
</div>
@endsection