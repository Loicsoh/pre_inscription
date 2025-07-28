@extends('welcome')

@section('title', 'Specialites')

@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-red-500 mb-6">Liste des specialites</h1>
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('specialites.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
            Ajouter une specialite
        </a>
    </div>
    <!-- Ajoutez ici le contenu de votre page, par exemple : -->
    <div>
        @if($specialites->count())
         <div class="p-4">
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($specialites as $specialite)
            <li class="border border-gray-300 p-2 my-2">
                    <img src="{{ asset('storage/' . $specialite->image) }}" alt="{{ $specialite->name }}" class="w-full object-cover h-auto mb-4">
                    <h1 class="text-white text-xl font-bold">{{$specialite->name}}</h1>
                    <p class="text-white ">{{$specialite->code}}</p>
                <div class="flex items-center gap-2 w-full mt-6">
                        <a href="{{route('specialites.edit', $specialite->id)}}" class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-1 rounded-md">modifier</a>
                    <form action="{{route('specialites.destroy', $specialite->id)}}" method="POST">
                         @csrf
                        @method('DELETE')
                        <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-1 rounded-md">supprimer</button>
                    </form>
                    <a href="{{route('specialites.show',$specialite->id)}}" class="text-white bg-blue-500 hover:bg-blue-800 px-4 py-1 rounded-md">Voir Description</a>
                </div>
            </li>
        @endforeach
        </ul>
    </div>

        <div class="mt-6">
            {{ $specialites->links() }}
        </div>
    @else
        <p class="text-gray-600">Aucune filière trouvée.</p>
    @endif
    </div>
</div>

@endsection