@extends('welcome')

@section('title', 'acceuil')

@section('content')

<h1 class="text-5xl justify-center text-white">page Home</h1>

@if($filieres->count())
<div class="p-4">
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($filieres as $filiere)
            <li class="border border-gray-300 p-2 my-2">
                    <img src="{{ asset('storage/' . $filiere->image) }}" alt="{{ $filiere->name }}" class="w-full object-cover h-auto mb-4">
                    <h1>{{$filiere->name}}</h1>
                    <p>{{$filiere->code}}</p>
                <div class="flex items-center gap-2 w-full mt-6">
                    <a href="{{route('filieres.show',$filiere->id)}}" class="text-white bg-blue-500 hover:bg-blue-800 px-4 py-1 rounded-md">Voir Description</a>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
    @else
    <p class="text-white">Aucune filière disponible.</p>
    @endif


@endsection