@extends('layouts.admin') {{-- Extend the admin layout --}}

@section('content')
<div class="container mx-auto my-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- Profile Header -->
        <div class="flex items-center space-x-4">
            <!-- Display User's Avatar -->
            <div>
                @php
                    $avatarPath = $user->avatar ? 'storage/avatars/' . $user->avatar : 'images/default-avatar.png';
                @endphp
                <img src="{{ $user->avatar ? asset('storage/avatars/' . $user->avatar) : asset('images/default-avatar.png') }}" 
                    alt="User Avatar" 
                    class="w-32 h-32 rounded-full shadow-md border border-gray-200">

            </div>

            <!-- User Info -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $user->name }}</h1>
                <p class="text-gray-600 mt-1">Username: {{ $user->name }}</p>
                <p class="text-gray-500 mt-1">Email: {{ $user->email }}</p>
                <p class="text-sm text-gray-400 mt-1">Joined: {{ $user->created_at->format('M d, Y') }}</p>
            </div>
        </div>

        <!-- Profile Actions -->
        <div class="mt-6">
            <a href="{{ route('admin.profile.edit') }}" 
               class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition duration-200">
                Edit Profile
            </a>

            <a href="{{ route('admin.avatar.edit') }}" 
               class="px-4 py-2 ml-4 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition duration-200">
                Update Avatar
            </a>
        </div>
    </div>

    <!-- Optional Additional Information -->
    <div class="bg-gray-100 mt-8 p-6 rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Additional Information</h2>
        <p class="text-gray-600">
            This is your admin profile. You can update your information and manage your avatar from here. For more settings, 
            visit the account settings page.
        </p>
    </div>
</div>
@endsection
