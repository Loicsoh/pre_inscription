@extends('welcome')

@section('title' 'accueil')

@section('content')

<div class="max-w-lg max-auto mt-10">
    <form action="{{ route('create') }}" class="p-8" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="title" class="text-gray-700 block mb-2 text-sm font-medium">nom de la specialite</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-3 py-2 border-gray-300 rounded-md shadow-md">
        </div>
        <div class="mb-6">
            <label for="description" class="text-gray-700 block mb-2 text-sm font-medium">description</label>
            <textarea type="text" id="description" name="description" class="w-full px-3 py-2 border-gray-300 rounded-md shadow-md"></textarea>
        </div>
        <div class="mb-6">
            <label for="category" class="text-gray-700 block mb-2 text-sm font-medium">Filiere</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}" class="w-full px-3 py-2 border-gray-300 rounded-md shadow-md">
        </div>
        <div class="mb-6">
            <label for="image" class="text-gray-700 block mb-2 text-sm font-medium">image</label>
            <input type="file" name="image" id="image" class="w-full px-3 py-2 border-gray-300 rounded-md shadow-md">
        </div>
        <div class="mb-6">
           <button type="submit" class="w-full py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-800">Creer Specialité</button>
        </div>
    </form>
</div>

@endsection