@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Settings</h1>

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-600">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-600">Email Address</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label for="about" class="block text-gray-600">About</label>
            <textarea name="about" id="about" class="w-full border rounded p-2">{{ $user->about }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
