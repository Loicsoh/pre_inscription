@extends('welcome')

@section('title',"show-filiere")

@section('content')

<div class="p-4">
   <h1 class="mt-6 font-bold text-6xl uppercase mb-6">{{$filiere->name}}</h1>
   <img src="{{ asset('storage/' . $filiere->image) }}" alt="{{ $filiere->name }}" class="w-full object-cover h-auto mb-4">
   <h2 class="font-bold text-3xl">{{$filiere->code}}</h2>
   <p>{{$filiere->description}}</p>
   <!-- <p class="italic">Ecrit par : {{$filiere->name}}</p>  -->
</div>

@endsection