@extends('welcome')

@section('title', 'specialite')

@section('content')

<div class="container mx-auto px-4 py-8">

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mx-auto px-4 py-8 max-w-xl">
        <div class="bg-white shadow-md rounded p-6">
            <h1 class="text-3xl font-bold text-red-600 mb-6">Mdifier la Spécialité</h1>

            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('specialites.update', $specialite->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nom de la spécialité <span class="text-red-600">*</span></label>
                    <input id="name" name="name" type="text" value="{{ old('name', $specialite->name) }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label for="code" class="block text-gray-700 font-semibold mb-2">Code <span class="text-red-600">*</span></label>
                    <input id="code" name="code" type="text" value="{{ old('code', $specialite->code) }}" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('description', $specialite->description) }}</textarea>
                </div>

                <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                <input type="file" name="image" id="image"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                @if($specialite->image)
                    <img src="{{ asset('storage/' . $specialite->image) }}" alt="Image de la specialite" class="mt-2 max-h-40">
                @endif
            </div>

                <div class="mb-4">
                    <label for="specialite_id" class="block text-gray-700 font-semibold mb-2">Filière <span class="text-red-600">*</span></label>
                    <select id="filiere_id" name="filiere_id" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="">-- Sélectionnez une filière --</option>
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}" {{ old('specialite_id') == $filiere->id ? 'selected' : '' }}>
                                {{ $filiere->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="niveau" class="block text-gray-700 font-semibold mb-2">Niveau</label>
                    <input id="niveau" name="niveau" type="text" value="{{ old('niveau', $specialite->niveau) }}"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Ex: Licence, Master...">
                </div>

                

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('specialites.index') }}" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100">Annuler</a>
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-800">Modifier</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection