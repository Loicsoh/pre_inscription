<x-app-layout>
    <x-slot name="header">
        <a class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="py-2 px-4 bg-green-500 hover:bg-green-700 text-white rounded-md" href="{{route('filieres.index')}}">filieres</a>
                    <a class="py-2 px-4 bg-green-500 hover:bg-green-700 text-white rounded-md" href="{{route('specialites.index')}}">specialites</a>
                    <a class="py-2 px-4 bg-green-500 hover:bg-green-700 text-white rounded-md" href="{{route('userliste.user')}}">({{$userCount}}) Users</a>
                    <a class="py-2 px-4 bg-green-500 hover:bg-green-700 text-white rounded-md" href="#">Pre_inscrit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
