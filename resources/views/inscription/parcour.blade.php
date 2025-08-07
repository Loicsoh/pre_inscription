@extends('welcome')

@section('title', 'inscription')

@section('content')


<!-- phase 4 -->
 <form action="{{ route('parcour.store') }}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto transition-colors duration-300" id="preinscriptionForm">
     
        @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" role="alert">
            <p>{{ session('success') }}</p>
            </div>
            @endif
            
            @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow" role="alert">
                <p>{{ session('error') }}</p>
            </div>
            @endif
            @csrf
             <div class="step hidden" id="step4">
                <h2 class="text-2xl font-semibold mb-4">Phase 4 : Cursus scolaire des quatre dernières années</h2>
                <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="font-semibold">2023-2024</label>
                        <input type="text" name="premiere" value="" class="rounded-xl">

                    </div>
                    <div>
                        <label class="font-semibold">2022-2023</label>
                        <input type="text" name="deuxieme" value="" class="rounded-xl">
                    </div>
                    <div>
                        <label class="font-semibold">2021-2022</label>
                        <input type="text" name="troisieme" value="" class="rounded-xl">
                    </div>
                    <div>
                        <label >2020-2021</label>
                        <input type="text" name="quatrieme" value="" class="rounded-xl">
                    </div>
                </div>
                <button type="button" class="prev-step bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-2">Précédent</button>
                <button type="submit" class="next-step bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Suivant</button>
            </div>

 </form>

            @vite('resources/js/app.js')

@endsection