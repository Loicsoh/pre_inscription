@extends('welcome')

@section('title', 'Notifications')

@section('content')
<div class="flex h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-8">
        <header class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-800 dark:text-white">Notifications</h2>
        </header>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            @foreach(auth()->user()->notifications as $notification)
                <div class="border-b border-gray-200 dark:border-gray-700 py-4">
                    <div class="flex items-center">
                        @if($notification->unread())
                            <span class="h-2 w-2 bg-blue-500 rounded-full mr-2"></span>
                        @endif
                        <p class="text-gray-800 dark:text-gray-200">{{ $notification->data['message'] ?? 'Notification' }}</p>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>
    </main>
</div>
@endsection