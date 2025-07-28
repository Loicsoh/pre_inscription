@extends('welcome')

@section('title', 'userlist')

@section('content')

<table class="min-w-full bg-white shadow-md rounded overflow-hidden">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nom de la Filière</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filieres as $filiere)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-4 px-6">{{ $filiere->id }}</td>
                    <td class="py-4 px-6 font-semibold">{{ $filiere->name }}</td>
                    <td class="py-4 px-6 font-semibold">{{ $filiere->code }}</td>
                    <td class="py-4 px-6">{{ Str::limit($filiere->description, 50) }}</td>
                    <td class="py-4 px-6 text-center space-x-2">
                        <a href="{{ route('filieres.show', $filiere->id) }}" class="text-blue-600 hover:underline">Voir</a>
                        <a href="{{ route('filieres.edit', $filiere->id) }}" class="text-yellow-600 hover:underline">Modifier</a>
                        <form action="{{ route('filieres.destroy', $filiere->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette filière ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@endsection