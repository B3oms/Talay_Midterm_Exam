@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 space-y-4">
    <!-- Profile Header -->
    <div class="flex items-center space-x-4">
        <img src="{{ $user->profile->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}"
             alt="Avatar" class="w-20 h-20 rounded-full border border-gray-300 dark:border-gray-600">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $user->name }}</h2>
            <p class="text-gray-500 dark:text-gray-400">@{{ Str::slug($user->name) }}</p>
        </div>
    </div>

    <!-- Tweets -->
    <div class="space-y-4">
        @forelse($tweets as $tweet)
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4 shadow hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                <p class="text-gray-800 dark:text-gray-200">{{ $tweet->content }}</p>
                <div class="text-gray-500 text-sm mt-2">{{ $tweet->created_at->diffForHumans() }}</div>
            </div>
        @empty
            <p class="text-gray-500 dark:text-gray-400">This user hasn’t posted any tweets yet.</p>
        @endforelse
    </div>
</div>
@endsection
