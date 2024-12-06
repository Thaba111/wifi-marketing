@extends('layouts.admin') {{-- Extend the admin layout --}}

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-2xl font-bold mb-4">Wave Admin</h1>
    <p class="text-gray-500 mb-6">Currently viewing admin's profile</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white shadow-lg p-6 rounded-lg">
        <!-- Left Section: Avatar and User Info -->
        <div class="flex items-center">
            <!-- If the user has an avatar, display it, else show a placeholder -->
            <img src="{{ $user->avatar ? asset('storage/avatars/'.$user->avatar) : asset('images/default-avatar.png') }}" alt="Admin Avatar" class="w-24 h-24 rounded-full mr-4">
            <div>
                <h2 class="text-lg font-semibold">{{ $user->name }}</h2>
                <p class="text-gray-600">@{{ $user->username }}</p>
                <p class="text-gray-500 mt-2">
                    Hello, I am the admin user. You can update this information in the edit profile section. Hope you enjoy using Wave.
                </p>
            </div>
        </div>

        <!-- Right Section: Image Upload Form -->
        <div class="bg-gray-100 p-4 rounded-lg">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="avatar" class="block text-gray-800 font-medium">Upload Avatar</label>
                <input type="file" id="avatar" name="avatar" class="mt-2 p-2 border border-gray-300 rounded-md">
                @error('avatar')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <button type="submit" class="mt-4 bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
                    Update Avatar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
