@extends('welcome')

@section('title', 'user')

@section('content')

<table class="min-w-full bg-white shadow-md rounded overflow-hidden">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">email</th>
                    <th class="py-3 px-6 text-left">Role</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-4 px-6">{{ $user->id }}</td>
                    <td class="py-4 px-6 font-semibold">{{ $user->name }}</td>
                    <td class="py-4 px-6 font-semibold">{{ $user->email }}</td>
                    <td class="py-4 px-6 text-center space-x-2">
                        <!-- Affiche le rôle actuel de l'utilisateur -->
                        <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <select name="role" onchange="this.form.submit()" class="text-yellow-600 bg-transparent border-none cursor-pointer hover:underline">
                                @foreach(['admin','user'] as $roleOption)
                                    <option value="{{ $roleOption }}" {{ $user->role === $roleOption ? 'selected' : '' }}>
                                        {{ ucfirst($roleOption) }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td class="py-4 px-6 text-center space-x-2">
                        <!-- <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:underline">Voir</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-600 hover:underline">Modifier</a> -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
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