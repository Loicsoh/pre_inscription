@extends('welcome')

@section('title', 'Filieres')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-red-600 mb-8">Liste des Filières</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('filieres.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
            Ajouter une Filière
        </a>
        <form action="{{ route('filieres.store') }}" method="GET" class="w-1/3">
            <input type="text" name="search" placeholder="Rechercher une filière..." value="{{ request('search') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500" />
        </form>
    </div>

    @if($filieres->count())
        




    <div class="p-4">
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($filieres as $filiere)
            <li class="border border-gray-300 p-2 my-2">
                    <img src="{{ asset('storage/' . $filiere->image) }}" alt="{{ $filiere->name }}" class="w-full object-cover h-auto mb-4">
                    <h1>{{$filiere->name}}</h1>
                    <p>{{$filiere->code}}</p>
                <div class="flex items-center gap-2 w-full mt-6">
                        <a href="{{route('filieres.edit', $filiere->id)}}" class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-1 rounded-md">modifier</a>
                    <form action="{{route('filieres.destroy', $filiere->id)}}" method="POST">
                         @csrf
                        @method('DELETE')
                        <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-1 rounded-md">supprimer</button>
                    </form>
                    <a href="{{route('filieres.show',$filiere->id)}}" class="text-white bg-blue-500 hover:bg-blue-800 px-4 py-1 rounded-md">Voir Description</a>
                </div>
            </li>
        @endforeach
        </ul>
    </div>

        <div class="mt-6">
            {{ $filieres->links() }}
        </div>
    @else
        <p class="text-gray-600">Aucune filière trouvée.</p>
    @endif
</div>
@endsection