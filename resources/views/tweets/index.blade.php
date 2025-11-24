@extends('layouts.app')

@section('content')
<!-- Tweet Form -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
    <form action="{{ route('tweet.store') }}" method="POST" class="space-y-2">
        @csrf
        <textarea name="content" placeholder="What's happening?" maxlength="280" required
                  class="w-full border border-gray-300 dark:border-gray-700 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-900 dark:text-white">{{ old('content') }}</textarea>
        <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500 dark:text-gray-400">{{ strlen(old('content') ?? '') }}/280</span>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold">Tweet</button>
        </div>
    </form>
</div>

<!-- Tweets List -->
@forelse($tweets as $tweet)
<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex space-x-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
    <img src="{{ optional($tweet->user->profile)->avatar ? asset('avatars/'.optional($tweet->user->profile)->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($tweet->user->name) }}"
         alt="Avatar" class="w-12 h-12 rounded-full border border-gray-300 dark:border-gray-600">

    <div class="flex-1">
        <div class="flex justify-between items-center mb-1">
            <div class="flex items-center space-x-2">
                <span class="font-bold">{{ $tweet->user->name }}</span>
                <span class="text-gray-500 text-sm dark:text-gray-400">@{{ Str::slug($tweet->user->name) }}</span>
            </div>
            <span class="text-gray-500 text-sm dark:text-gray-400">{{ $tweet->created_at->diffForHumans() }}</span>
        </div>
        <p class="text-gray-800 dark:text-gray-200 mb-2">{{ $tweet->content }}</p>

        <!-- Actions -->
        <div class="flex space-x-6 text-gray-500 dark:text-gray-400 text-sm">
            <form action="{{ route('tweet.like', $tweet) }}" method="POST" class="flex items-center space-x-1">
                @csrf
                <button type="submit" class="hover:text-blue-500 flex items-center">❤️ {{ $tweet->likes->count() }}</button>
            </form>
            <form action="{{ route('tweet.retweet', $tweet) }}" method="POST" class="flex items-center space-x-1">
                @csrf
                <button type="submit" class="hover:text-green-500 flex items-center">🔁 {{ $tweet->retweets->count() }}</button>
            </form>
        </div>
    </div>
</div>
@empty
<div class="text-center text-gray-500 dark:text-gray-400 p-4 bg-white dark:bg-gray-800 rounded-xl shadow">
    No tweets yet. Be the first to tweet!
</div>
@endforelse
@endsection
