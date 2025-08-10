@extends('welcome')

@section('title', 'user')

@section('content')

<h1 class="text-5xl justify-center text-white">Specialites</h1>
@if($specialites->count())
<div class="p-4">
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($specialites as $specialite)
            <li class="border border-gray-300 p-2 my-2">
                    <img src="{{ asset('storage/' . $specialite->image) }}" alt="{{ $specialite->name }}" class="w-full object-cover h-auto mb-4">
                    <h1 class="text-white text-xl font-bold">{{$specialite->name}}</h1>
                    <p class="text-white">{{$specialite->code}}</p>
                <div class="flex items-center gap-2 w-full mt-6">
                    <a href="{{route('specialites.show',$specialite->id)}}" class="text-white bg-blue-500 hover:bg-blue-800 px-4 py-1 rounded-md">Voir Description</a>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
    @else
    <p class="text-white">Aucune specialite disponible.</p>
    @endif

@endsection