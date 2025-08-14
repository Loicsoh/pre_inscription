@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Notifications</h1>
    
    <div class="bg-white shadow rounded-lg p-6">
        @if($notifications->count() > 0)
            <ul class="divide-y divide-gray-200">
                @foreach($notifications as $notification)
                    <li class="py-4">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">{{ $notification->data['message'] ?? 'Notification' }}</p>
                                <p class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No notifications found.</p>
        @endif
    </div>




    <ul>
             @foreach(auth()->user()->unreadNotifications as $notification)
            <li class="p-3 bg-blue-50 rounded-lg">
                <div class="flex justify-between">
                    <span>{{ $notification->data['message'] }}</span>
                    <a href="{{ $notification->data['link'] ?? '#' }}" class="text-blue-600 hover:underline">Voir</a>
                </div>
                <small class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
            </li>
    @endforeach
        </ul>

        
        <ul>
    @foreach(User::where('statut', 'en attente')->get() as $user)
        <li>{{ $user->name }} - <a href="{{ route('admin.inscription.show', $user) }}">Vérifier</a></li>
    @endforeach
    </ul>
</div>
@endsection