@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="bio" class="block font-semibold mb-1">Bio</label>
            <textarea name="bio" id="bio" rows="3"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                      maxlength="160">{{ $profile->bio }}</textarea>
        </div>

        <div>
            <label for="avatar" class="block font-semibold mb-1">Profile Picture</label>
            <input type="file" name="avatar" id="avatar" class="border p-2 rounded w-full">
            @if($profile->avatar)
                <img src="{{ asset('avatars/'.$profile->avatar) }}" alt="Avatar"
                     class="w-24 h-24 rounded-full mt-2 border border-gray-300">
            @endif
        </div>

        <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded font-semibold">
            Save Profile
        </button>
    </form>
</div>
@endsection
